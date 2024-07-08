<?php
session_start();

if (isset($_POST['usuario'], $_POST['senha'])) {
    // Simplesmente definimos informações de sessão aqui, sem verificação específica
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['nome_exibicao'] = $_POST['usuario']; // Usando o nome de usuário digitado como nome de exibição

    // Definindo uma biografia padrão (pode ser personalizado conforme necessário)
    $_SESSION['biografia'] = 'Bem-vindo ao SiteCantina!';

    header('Location: home.php');
    exit; // Pare a execução do script após o redirecionamento
}

if (isset($_GET['erro'])) {
    $erro = 'Você não tem permissão';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiteCantina</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-weight: bold;
            font-size: 24px;
            color: #343a40;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login - SiteCantina</h5>
                        <?php if (isset($erro)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erro; ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, necessário apenas se você usar componentes que dependem do JS do Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-Mk1G1JDFjVBDTRZ7FC68spz5pbhN0fdAwrRVHbeuhxUvZwPG+8fGiCws/8U8I6+1" crossorigin="anonymous"></script>
</body>
</html>

