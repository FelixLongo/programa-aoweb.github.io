<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Visitas</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Consultar Visitas</h1>
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
        <h2>Consulta de Visitas</h2>
        <form method="POST" action="">
            <label for="data_visita">Data da Visita:</label>
            <input type="date" id="data_visita" name="data_visita">
            <button type="submit" name="consultar">Consultar</button>
        </form>
        
        <?php
        session_start();
        
        // Verifica se o botão de logout foi clicado
        if (isset($_POST['logout'])) {
            // Destruir a sessão
            session_destroy();
            // Redirecionar para a página de login
            header("Location: login.php");
            exit();
        }
        
        // Verifica se o formulário foi enviado
        if (isset($_POST['consultar'])) {
            // Aqui você pode adicionar a lógica para consultar as visitas no banco de dados
            // Substitua este exemplo pela sua lógica de consulta real
            echo "<h3>Resultados da Consulta:</h3>";
            echo "<table>";
            echo "<tr><th>Data da Visita</th><th>Nome do Visitante</th><th>Status</th></tr>";
            echo "<tr><td>2024-06-10</td><td>Nome do Visitante 1</td><td>Pendente</td></tr>";
            echo "<tr><td>2024-06-12</td><td>Nome do Visitante 2</td><td>Confirmada</td></tr>";
            echo "<tr><td>2024-06-15</td><td>Nome do Visitante 3</td><td>Cancelada</td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

