<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar um registro específico do banco de dados
    function listarRegistro($conexao, $id) {
        $sql = "SELECT * FROM aluno WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar o registro do aluno
    $registro = listarRegistro($conexao, $id);

    // Verificar se o registro foi encontrado
    if ($registro) {
        $aux = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
</head>
<body>
    <h1>Editar Aluno</h1>
    <?php if (isset($aux)) : ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $registro['email']; ?>" required>
            <br>
            <label>Sexo:</label>
            <input type="text" name="sexo" value="<?php echo $registro['sexo']; ?>" required>
            <br>
            <br>
            <label >Modalidade</label>
    <select id="modalidade" name="modalidade">
    <option value="Pilates">Pilates</option>
    <option value="Musculação">Musculação</option>
    <option value="Natação">Natação</option>
    <option value="zumba">Zumba</option>
    <br>
    </select>
  </div>
            <input type="submit" value="Salvar">
        </form>
    <?php else : ?>
        <p>Aluno não encontrado.</p>
    <?php endif; ?>
</body>
</html>

