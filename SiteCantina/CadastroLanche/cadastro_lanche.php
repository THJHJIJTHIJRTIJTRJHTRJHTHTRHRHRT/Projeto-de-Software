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

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Preencha os detalhes do lanche</h3>
            </div>
            <div class="panel-body">
                <form id="lancheForm" action="create_lanche.php" method="POST">
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
                    <a href="../CadastroFuncionario/home.php" class="btn btn-success">Voltar para a página inicial</a>
                </form>
            </div>
        </div>
    </div>

    <script type="module">
      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
      import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

      // Your web app's Firebase configuration
      const firebaseConfig = {
        apiKey: "AIzaSyBSeMAet-Bu9IlgtdJ_xKmbMruyc6FtRfA",
        authDomain: "test-php-ff645.firebaseapp.com",
        databaseURL: "https://test-php-ff645-default-rtdb.firebaseio.com",
        projectId: "test-php-ff645",
        storageBucket: "test-php-ff645.appspot.com",
        messagingSenderId: "321033268597",
        appId: "1:321033268597:web:d87e4621f57acac495b73c"
      };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const db = getFirestore(app);

      // Handle form submission
      document.getElementById('lancheForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const nome = document.getElementById('nome').value;
        const preco = document.getElementById('Preco').value;
        const descricao = document.getElementById('Descricao').value;
        
        // Adiciona ao Firestore
        try {
          const docRef = await addDoc(collection(db, "lanche"), {
            nome: nome,
            preco: parseFloat(preco),
            descricao: descricao
          });
          console.log("Lanche adicionado ao Firestore com ID: " + docRef.id);
        } catch (e) {
          console.error("Erro ao adicionar lanche no Firestore: ", e);
        }

        // Submete o formulário para o PHP adicionar ao MySQL
        document.getElementById('lancheForm').submit();
      });
    </script>
</body>
</html>

