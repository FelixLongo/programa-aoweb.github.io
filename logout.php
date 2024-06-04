<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Logout</title>
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
        .logout-form {
            display: inline;
        }
        .logout-form button {
            background: none;
            border: none;
            color: #fff;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Nome do Museu</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="exposicoes.php">Exposições</a>
            <a href="agendamentos.php">Agendamentos</a>
            <a href="galeria.php">Galeria</a>
            <a href="recursos_educacionais.php">Recursos Educacionais</a>
            <form class="logout-form" method="POST" action="">
                <button type="submit" name="logout">Logout</button>
            </form>
        </nav>
    </header>
    <div class="container">
        <h1>Bem-vindo ao Nome do Museu</h1>
        <p>Conteúdo da página aqui...</p>
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
