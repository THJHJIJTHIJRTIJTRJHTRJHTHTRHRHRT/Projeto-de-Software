<?php
echo "Inserindo dados abaixo... <br>";
require("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $senha = htmlspecialchars($_POST["senha"]);
    $confirmarSenha = htmlspecialchars($_POST["confirmarSenha"]);

    if (empty($nome) || empty($email ) || empty( $senha ) || empty($confirmarSenha)) {
        echo "Erro: Todos os campos são obrigatórios.";
    } elseif ( $senha !== $confirmarSenha) {
        echo "Erro: As senhas não coincidem.";
    } else {
        if (inserirRegistro($conexao, $nome, $email, $senha,$confirmarSenha )) {
            echo "Registro inserido com sucesso! <br><a href='cadastro_funcionario.php'>Home</a> | <a href='index_funcionario.php'>VER TABELA</a>";
        } else {
            echo "Erro ao inserir Registro";
        }
    }
} else {
    echo "Método HTTP inválido.";
}

// Função para inserir no banco
function inserirRegistro($conexao, $nome, $email,  $senha,$confirmarSenha )
{
    try {
        $conexao->beginTransaction();

        $sql = "INSERT INTO FUNCIONARIO (Nome, Email, Senha,confirmarSenha ) VALUES (:Nome, :Email, :Senha,:confirmarSenha )";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':Nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':Senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':confirmarSenha', $confirmarSenha, PDO::PARAM_STR);

        $stmt->execute();
        $conexao->commit();
        return true;
    } catch (PDOException $e) {
        $conexao->rollBack();
        echo "Erro ao inserir Registro: " . $e->getMessage();
        return false;
    }
}
?>

