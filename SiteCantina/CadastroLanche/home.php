<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiteCantina</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 960px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            color: #666;
            margin-bottom: 15px;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .btn-primary:active,
        .btn-primary.active,
        .show > .btn-primary.dropdown-toggle {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:active:focus,
        .btn-primary.active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SiteCantina</h1>

        <div class="section">
            <h2>Cadastro de Lanches</h2>
            <p>Bem-vindo ao sistema de cadastro de lanches da Cantina.</p>
            <a href="cadastro_lanche.php" class="btn btn-primary">Ir para o Cadastro de Lanches</a>
        </div>

        <div class="section">
            <h2>Ver os lanches disponíveis</h2>
            <p>Acompanhe a tabela.</p>
            <a href="index_lanche.php" class="btn btn-primary">Ir para a tabela de lanches</a>
        </div>

   
    </div>



</body>
</html>
