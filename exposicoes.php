<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Exposição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            color: #fff;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1 {
            color: #333;
            margin-top: 0;
        }
        form {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
        }
        input[type="text"], input[type="date"], textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Inserir Exposição</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="exposicoes.php">Exposições</a>
            <a href="consultar.php">Consultar Visita</a>
            <a href="galeria.php">Galeria</a>
            <a href="recursos_educacionais.php">Recursos Educacionais</a>
            <form method="POST" action="">
                <button type="submit" name="logout">Logout</button>
            </form>
        </nav>
    </header>
    <div class="container">
        <form method="POST" action="inserir_exposicao.php">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" required>
            <label for="data_fim">Data de Fim:</label>
            <input type="date" id="data_fim" name="data_fim" required>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>
            <label for="imagem_url">URL da Imagem:</label>
            <input type="text" id="imagem_url" name="imagem_url" required>
            <button type="submit">Inserir Exposição</button>
        </form>
    </div>

    <?php
    session_start();

    if (isset($_POST['logout'])) {
        // Destruir a sessão
        session_destroy();
        // Redirecionar para a página de login
        header("Location: login.php");
        exit();
    }

    // Aqui você pode adicionar mais código PHP se necessário
    ?>
</body>
</html>



