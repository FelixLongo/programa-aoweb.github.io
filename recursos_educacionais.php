<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Recurso Educacional</title>
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
        input[type="text"], textarea, select, button {
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
        <h1>Inserir Recurso Educacional</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conexão com o banco de dados
            $conn = new mysqli('localhost', 'root', '', 'exame_web_2');
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Coletando dados do formulário
            $titulo = $conn->real_escape_string($_POST['titulo']);
            $descricao = $conn->real_escape_string($_POST['descricao']);
            $tipo = $conn->real_escape_string($_POST['tipo']);
            $caminho = $conn->real_escape_string($_POST['caminho']);

            // Verificando e ajustando o caminho
            if ($tipo == 'video' && strpos($caminho, '/videos/') !== 0) {
                $caminho = '/videos/' . $caminho;
            } elseif ($tipo == 'pdf' && strpos($caminho, '/livros/') !== 0) {
                $caminho = '/livros/' . $caminho;
            } elseif ($tipo == 'musica' && strpos($caminho, '/musicas/') !== 0) {
                $caminho = '/musicas/' . $caminho;
            } elseif ($tipo == 'imagem' && strpos($caminho, '/imagens/') !== 0) {
                $caminho = '/imagens/' . $caminho;
            }

            // Preparando e executando a consulta SQL para inserir o recurso
            $sql = "INSERT INTO recursos_educacionais (titulo, descricao, tipo, caminho) VALUES ('$titulo', '$descricao', '$tipo', '$caminho')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Recurso inserido com sucesso!</p>";
            } else {
                echo "<p>Erro ao inserir recurso: " . $conn->error . "</p>";
            }

            // Fechando a conexão com o banco de dados
            $conn->close();
        }
        ?>
        <form method="POST" action="">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" rows="4" required></textarea>
            <label for="tipo">Tipo:</label>
            <select name="tipo" required>
                <option value="video">Vídeo</option>
                <option value="pdf">PDF</option>
                <option value="musica">Música</option>
                <option value="imagem">Imagem</option>
            </select>
            <label for="caminho">Caminho:</label>
            <input type="text" name="caminho" placeholder="video/video1.mp4" required>
            <button type="submit">Inserir Recurso</button>
        </form>
    </div>
</body>
</html>









