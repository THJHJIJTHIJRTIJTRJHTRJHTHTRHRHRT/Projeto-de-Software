<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Lanche</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
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
    <h2>Cadastro de Lanches</h2>

    <?php require("conexao.php"); ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Preencha os detalhes do lanche</h3>
            </div>
            <div class="panel-body">
                <form action="create_lanche.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome do Lanche</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o nome do lanche" required>
                    </div>
                    <div class="form-group">
                        <label for="Preco">Preço</label>
                        <input type="number" class="form-control" id="Preco" name="Preco" placeholder="Informe o preço do lanche" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="Descricao">Descrição</label>
                        <input type="text" class="form-control" id="Descricao" name="Descricao" placeholder="Informe a descrição do lanche" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
