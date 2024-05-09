<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANTINASITE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h2>Atualizar lanche</h2>

    <?php require("conexao.php"); ?>

    <div class="container">
        <form action="update_funcionario.php" method="POST">
            <div class="form-group">
            <label>ID do Funcionário:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Informe o ID do lanche a ser atualizado">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Informe o nome" required><br>
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Informe o email" required><br>
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Informe a senha" required><br>
                <label>Confirmar Senha</label>
                <input type="password" name="confirmarSenha" class="form-control" placeholder="Confirme a senha" required><br>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Atualizando dados abaixo...  <br>";
        require ('conexao.php');

        $id = isset($_POST["id"]) ? $_POST["id"] : '';
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confirmarSenha = $_POST["confirmarSenha"];
        echo "<hr>";
     
        // Função para Atualizar o registro no banco de dados
        function atualizarRegistro($conexao, $id, $nome, $email, $senha, $confirmarSenha) {
            $sql = "UPDATE FUNCIONARIO SET Nome = :nome, Email = :email, Senha = :senha, ConfirmarSenha = :confirmarSenha WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':confirmarSenha', $confirmarSenha, PDO::PARAM_STR);
            return $stmt->execute();
        }

        if (atualizarRegistro($conexao, $id, $nome, $email, $senha, $confirmarSenha)) {
            echo "Registro atualizado com sucesso!<br>" . "<a href='cadastro_funcionario.php'>HOME<br></a>". "<a href='index_funcionario.php'>ver tabela</a>";
        } else {
            echo 'Erro ao atualizar o registro.';
        }
    }
    ?>
</body>
</html>

