<?php
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $conn = new mysqli('localhost', 'root', '', 'exame_web_2');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        input[type="text"], input[type="email"], input[type="password"], button {
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
        </nav>
    </header>
    <div class="container">
        <h1>Registro</h1>
        <form method="POST" action="register.php">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
            <button type="submit">Registrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
    </div>
</body>
</html>
