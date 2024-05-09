<?php
    require('conexao.php');

    // Função para listar todos os registros do banco de dados
    function listarRegistros($conexao) {
        $sql = "SELECT * FROM FUNCIONARIO";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar registros
    $registros = listarRegistros($conexao);

    echo "<style>
        .table-container {
            margin: 0 auto;
            width: 80%;
            max-width: 1000px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-links a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .action-links a:hover {
            background-color: #45a049;
        }
    </style>";

    echo "<div class='table-container'>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Confirmar Senha</th>
                    <th>Ações</th>
                </tr>";
    foreach ($registros as $registro) {
        echo "<tr>
                <td>{$registro['id']}</td>
                <td>{$registro['nome']}</td>
                <td>{$registro['email']}</td>
                <td>{$registro['senha']}</td>
                <td>{$registro['confirmarSenha']}</td>
                <td class='action-links'>
                    <a href='update_funcionario.php?id={$registro['id']}'>Editar</a>
                    <a href='delete_funcionario.php?id={$registro['id']}'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>
          </div>";
    echo "Oi,entre no sistema clique aqui! <br><a href='cadastro_funcionario.php'>Cadastrar</a> <br>";
    echo "Clique aqui para ir pra página inicial! <br><a href='home.php'>HOME</a>";

   
 
    
?>

