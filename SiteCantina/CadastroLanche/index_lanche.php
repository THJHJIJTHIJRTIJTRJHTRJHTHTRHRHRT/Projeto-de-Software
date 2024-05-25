<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Lanche</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #337ab7;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Lanches</h1>
        <div class="text-right">
            <a href="cadastro_lanche.php" class="btn btn-success">Adicionar Novo Lanche</a>
        </div>
        <br>
        <?php
            require('conexao.php');
            // Função para listar todos os registros do banco de dados
            function listarRegistros($conexao) {
                $sql = "SELECT * FROM lanche";
                $stmt = $conexao->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            // Listar registros
            $registros = listarRegistros($conexao);
            // Exibindo os dados em uma tabela
            echo "<table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lanche</th>
                            <th>Preço</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($registros as $registro) {
                echo "<tr>
                        <td>{$registro['id']}</td>
                        <td>{$registro['nome']}</td>
                        <td>{$registro['preco']}</td>
                        <td>{$registro['descricao']}</td>
                        <td class='action-links'>
                            <a href='edit_lanche.php?id={$registro['id']}' class='btn btn-info btn-sm'>Editar</a>
                            <a href='delete_lanche.php?id={$registro['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                        </td>
                    </tr>";
            }
            echo "</tbody>
                </table>";
            echo "<div class='text-center'>
                    <a href='../home.php' class='btn btn-primary'>Home</a>
                  </div>";
        ?>
    </div>
</body>
</html>
