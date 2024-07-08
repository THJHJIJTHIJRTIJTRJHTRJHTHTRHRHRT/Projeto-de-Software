<?php
require('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Função para listar um registro específico do banco de dados
    function listarRegistro($conexao, $id) {
        $sql = "SELECT * FROM lanche WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar o registro do lanche
    $registro = listarRegistro($conexao, $id);

    // Verificar se o registro foi encontrado
    if ($registro) {
        $aux = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Lanche</title>
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
    <div class="container">
        <h1>Editar Lanche</h1>
        <?php if (isset($aux)) : ?>
            <form id="editForm" action="update_lanche.php" method="post">
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $registro['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $registro['preco']; ?>" step="any" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $registro['descricao']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        <?php else : ?>
            <p class="alert alert-danger">Lanche não encontrado.</p>
        <?php endif; ?>
    </div>

    <!-- Firebase JavaScript SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js"></script>
    <!-- Initialize Firebase -->
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyBSeMAet-Bu9IlgtdJ_xKmbMruyc6FtRfA",
            authDomain: "test-php-ff645.firebaseapp.com",
            databaseURL: "https://test-php-ff645-default-rtdb.firebaseio.com",
            projectId: "test-php-ff645",
            storageBucket: "test-php-ff645.appspot.com",
            messagingSenderId: "321033268597",
            appId: "1:321033268597:web:d87e4621f57acac495b73c"
        };
        firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();

        // Preenche o formulário com os dados do lanche a ser editado
const editForm = document.getElementById('editForm');
editForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const nome = editForm.nome.value;
    const preco = editForm.preco.value;
    const descricao = editForm.descricao.value;
    const id = editForm.id.value;
    
    try {
        await db.collection("lanche").doc(id).set({
            nome: nome,
            preco: preco,
            descricao: descricao
        });
        console.log("Lanche atualizado com sucesso no Firestore!");
        // Você pode adicionar aqui alguma mensagem de sucesso se desejar
    } catch (error) {
        console.error("Erro ao atualizar lanche no Firestore:", error);
    }
        });
    </script>
</body>
</html>

