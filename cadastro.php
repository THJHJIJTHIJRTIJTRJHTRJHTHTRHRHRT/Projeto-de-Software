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
        <h2 class="text-center mb-4">Cadastro de Lanches</h2>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="Nomelanche">Nome do Lanche</label>
                <input type="text" class="form-control" id="Nomelanche" name="Nomelanche" placeholder="Informe o nome do lanche" required>
            </div>
            <div class="form-group">
                <label for="Preco">Preço</label>
                <input type="number" step="0.01" class="form-control" id="Preco" name="Preco" placeholder="Informe o preço do lanche" required>
            </div>
            <div class="form-group">
                <label for="Descricao">Descrição</label>
                <input type="text" class="form-control" id="Descricao" name="Descricao" placeholder="Informe a descrição do lanche" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
