<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: cadastro_funcionario.php?erro=true');
    exit; // Pare a execução do script após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanches - SiteCantina</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 960px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .lanche-card {
            margin-bottom: 20px;
        }
        .lanche-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .lanche-body {
            padding: 15px;
            text-align: center;
        }
        .lanche-title {
            font-size: 18px;
            font-weight: bold;
        }
        .lanche-price {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }
        .buy-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .buy-btn:hover {
            background-color: #c82333;
        }
        .header {
            background-color: #dc3545;
            color: white;
            text-align: center;
            padding: 10px;
       
        }
        .footer {
            background-color: #dc3545; /* Vermelho Bootstrap padrão */
            color: white;
            text-align: center;
            padding: 10px;
            position:fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho com links -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SiteCantina</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../CadastroLanche/cadastro_lanche.php">Adicionar um lanche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Cadastrolanche/index_lanche.php">Ver lanches adicionados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Perfil.php">Perfil</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair do perfil</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Conteúdo principal -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 lanche-card">
                <div class="card">
                    <img src="caminho/para/imagem_lanche1.jpg" alt="Lanche 1" class="lanche-img">
                    <div class="lanche-body">
                        <h5 class="lanche-title">Lanche 1</h5>
                        <p class="lanche-price">R$ 10,00</p>
                        <button class="buy-btn" data-lanche-id="1" data-price="10.00">Comprar</button>



                    </div>
                </div>
            </div>
            <div class="col-md-4 lanche-card">
                <div class="card">
                    <img src="caminho/para/imagem_lanche2.jpg" alt="Lanche 2" class="lanche-img">
                    <div class="lanche-body">
                        <h5 class="lanche-title">Lanche 2</h5>
                        <p class="lanche-price">R$ 12,00</p>
                        <button class="buy-btn" data-lanche-id="2" data-price="12.00">Comprar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 lanche-card">
                <div class="card">
                    <img src="caminho/para/imagem_lanche3.jpg" alt="Lanche 3" class="lanche-img">
                    <div class="lanche-body">
                        <h5 class="lanche-title">Lanche 3</h5>
                        <p class="lanche-price">R$ 15,00</p>
                        <button class="buy-btn" data-lanche-id="3" data-price="15.00" data-url="processar_pagamento.php">Comprar</button>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <div class="footer">
        <p>Aproveite o site</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-Mk1G1JDFjVBDTRZ7FC68spz5pbhN0fdAwrRVHbeuhxUvZwPG+8fGiCws/8U8I6+1" crossorigin="anonymous"></script>
</body>
</html>

