<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANTINASITE</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (obrigatório para alguns recursos do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

    <style>
        /* Estilos CSS personalizados */

        /* Centralizar o formulário */
        .container {
            max-width: 600px;
            margin: auto;
        }

        /* Adicionar espaço superior e inferior ao formulário */
        .form-group {
            margin-bottom: 20px;
        }

        /* Estilo para o botão Enviar */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cadastro de Funcionários</h2>
        <form action="create_funcionario.php" method="POST">
            <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome"  class="form-control" placeholder="Informe o nome" required><br>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Informe o email" required><br>
            <label>Insira a Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Informe a senha" required><br>
            <label>Confirme a Senha</label>
            <input type="password" name="confirmarSenha" class="form-control" placeholder="Confirme a senha" required><br>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
           
        </form>
    </div>
</body>
</html>

