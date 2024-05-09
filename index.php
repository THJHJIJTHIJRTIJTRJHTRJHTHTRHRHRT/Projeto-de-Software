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
                    <th>Nomelanche</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>";
    foreach ($registros as $registro) {
        echo "<tr>
                <td>{$registro['id']}</td>
                <td>{$registro['Nomelanche']}</td>
                <td>R$ {$registro['Preco']}</td>
                <td>{$registro['Descricao']}</td>
                <td class='action-links'>
                    <a href='update.php?id={$registro['id']}'>Editar</a>
                    <a href='delete.php?id={$registro['id']}'>Excluir</a>
                </td>
            </tr>";
    }
    echo "</table>
          </div>";
    echo "Coloque um novo lanche! <br><a href='cadastro.php'>Inserir Lanche</a>";
?>

