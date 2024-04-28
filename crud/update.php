<?php
echo "Atualizando dados abaixo...  <br>";
require ('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $modalidade = $_POST["modalidade"];
    echo "<hr>";
 
    // Função para Atualizar o registro no banco de dados
    function atualizarRegistro($conexao, $id, $nome, $email, $sexo, $modalidade) {
        $sql = "UPDATE aluno SET nome = '$nome', email = '$email', sexo = '$sexo',  modalidade = '$modalidade'  WHERE id = $id";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute();
    }
}
if (atualizarRegistro($conexao, $id, $nome, $email, $sexo, $modalidade)) {
    echo "Registro atualizado com sucesso!<br>" . "<a href='cadastro.php'>HOME<br></a>". "<a href='index.php'>ver tabela</a>";
} else {
    echo 'Erro ao inserir o registro.';}
?>