<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Visitas</title>
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
        input[type="text"], input[type="date"], input[type="time"], button {
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
        }
        button:hover {
            background: #555;
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
            <a href="agendamentos.php">Agendamentos</a>
        </nav>
    </header>
    <div class="container">
        <h1>Agendamento de Visitas</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conexão com o banco de dados
            $conn = new mysqli('localhost', 'root', '', 'exame_web_2');
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Coletando dados do formulário
            $usuario_id = $conn->real_escape_string($_POST['usuario_id']);
            $data_visita = $conn->real_escape_string($_POST['data_visita']);
            $hora_visita = $conn->real_escape_string($_POST['hora_visita']);

            // Preparando e executando a consulta SQL para inserir o agendamento
            $sql = "INSERT INTO agendamentos (usuario_id, data_visita, hora_visita) VALUES ('$usuario_id', '$data_visita', '$hora_visita')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Agendamento realizado com sucesso!</p>";
            } else {
                echo "<p>Erro ao realizar agendamento: " . $conn->error . "</p>";
            }

            // Fechando a conexão com o banco de dados
            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="usuario_id">ID do Usuário:</label>
            <input type="text" name="usuario_id" required>
            <label for="data_visita">Data da Visita:</label>
            <input type="date" name="data_visita" required>
            <label for="hora_visita">Hora da Visita:</label>
            <input type="time" name="hora_visita" required>
            <button type="submit">Agendar Visita</button>
        </form>
    </div>
</body>
</html>
