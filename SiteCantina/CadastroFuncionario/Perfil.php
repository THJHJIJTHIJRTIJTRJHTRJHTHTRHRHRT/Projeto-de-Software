<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: cadastro_funcionario.php?erro=true');
    exit; // Pare a execução do script após o redirecionamento
}

// Processar o upload da foto de perfil, se houver envio
if (isset($_FILES['foto_perfil'])) {
    if ($_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = dirname(__FILE__) . '/'; // Diretório atual onde este script PHP está localizado
        $filename = $_FILES['foto_perfil']['name'];
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $upload_dir . $filename);
        $_SESSION['foto_perfil'] = $filename; // Salva apenas o nome do arquivo na sessão
    } else {
        echo '<script>alert("Erro ao carregar a imagem. Por favor, tente novamente.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SiteCantina</title>
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
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .username {
            font-size: 24px;
            font-weight: bold;
        }
        .bio {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .logout {
            margin-top: 20px;
        }
        /* Estilos para o cabeçalho */
        .header {
            background-color: #dc3545; /* Vermelho Bootstrap padrão */
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Estilos para o rodapé */
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
        <img src="<?php echo htmlspecialchars($_SESSION['foto_perfil'] ?? ''); ?>" alt="Foto do Perfil" class="profile-pic">
        <h1 class="username"><?php echo "Olá, " . htmlspecialchars($_SESSION['nome_exibicao'] ?? ''); ?></h1>
        <p class="bio"><?php echo htmlspecialchars($_SESSION['biografia'] ?? ''); ?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto_perfil">Escolha sua foto de perfil:</label>
                <input type="file" class="form-control-file" id="foto_perfil" name="foto_perfil">
            </div>
            <button type="submit" class="btn btn-primary">Enviar Foto</button>
        </form>
    </div>

    <!-- Rodapé -->
    <div class="footer">
        <p>Aproveite o site</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-Mk1G1JDFjVBDTRZ7FC68spz5pbhN0fdAwrRVHbeuhxUvZwPG+8fGiCws/8U8I6+1" crossorigin="anonymous"></script>
</body>
</html>
