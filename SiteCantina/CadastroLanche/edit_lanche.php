<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar um registro específico do banco de dados
    function listarRegistro($conexao, $id) {
        $sql = "SELECT * FROM lanche WHERE id = :id";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Lanche</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        .btn-primary:hover {
            background-color: #4cae4c;
            border-color: #398439;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Lanche</h1>
        <?php if (isset($aux)) : ?>
            <form action="update_lanche.php" method="post">
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $registro['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $registro['preco']; ?>" step="any" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $registro['descricao']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        <?php else : ?>
            <p class="alert alert-danger">Lanche não encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
