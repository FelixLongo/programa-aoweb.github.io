<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
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
        p {
            line-height: 1.6;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Nome do Museu</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="recursos_educacionais.php">Recursos Educacionais</a>
            <a href="exposicoes.php">Exposições</a>
            <a href="agendamentos.php">Agendamentos</a>
            <a href="consultar.php">Consultar Visita</a>
            <a href="galeria.php">Galeria Virtual</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <div class="container">
        <h1>Bem-vindo ao Museu</h1>
        <p>Explore nossos recursos e exposições.</p>
    </div>
</body>
</html>
