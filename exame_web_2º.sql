CREATE DATABASE exame_web_2;
USE exame_web_2;

-- Tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de recursos educacionais
CREATE TABLE recursos_educacionais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    caminho VARCHAR(255) NOT NULL
);

-- Tabela de exposições
CREATE TABLE exposicoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    imagem_url VARCHAR(255) NOT NULL
);

-- Tabela de agendamentos
CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    data_visita DATE NOT NULL,
    hora_visita TIME NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'Pendente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabela de galeria
CREATE TABLE galeria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem_url VARCHAR(255) NOT NULL
);

-- Selecionar todos os recursos educacionais
SELECT * FROM recursos_educacionais;

-- Selecionar todas as exposições
SELECT * FROM exposicoes;

-- Selecionar agendamentos de um usuário específico
SELECT * FROM agendamentos WHERE usuario_id = 1;

-- Inserir um novo usuário
INSERT INTO usuarios (nome, email, senha)
VALUES ('João da Silva', 'joao@example.com', 'senha123');

-- Inserir um novo recurso educacional
INSERT INTO recursos_educacionais (titulo, descricao, data_publicacao) 
VALUES ('História da Arte', 'Descrição do recurso', '2023-06-01');

-- Inserir uma nova exposição
INSERT INTO exposicoes (titulo, descricao, data_inicio, data_fim) 
VALUES ('Exposição de Pinturas', 'Descrição da exposição', '2023-06-10', '2023-07-10');

-- Inserir um novo agendamento
INSERT INTO agendamentos
 (usuario_id, data_visita, hora_visita) VALUES
 (1, '2023-06-15', '10:00:00');

-- Inserir uma nova imagem na galeria
INSERT INTO galeria (titulo, descricao, imagem_url) 
VALUES ('Quadro de Van Gogh', 'Descrição do quadro', 'url_imagem');

-- Atualizar o status de um agendamento
UPDATE agendamentos SET status = 'Confirmado' WHERE id = 1;

-- Atualizar a descrição de uma exposição
UPDATE exposicoes SET descricao = 'Nova descrição' WHERE id = 1;

-- Deletar um usuário
DELETE FROM usuarios WHERE id = 1;

-- Deletar um recurso educacional
DELETE FROM recursos_educacionais WHERE id = 1;

ALTER TABLE recursos_educacionais
ADD COLUMN tipo ENUM('video', 'pdf', 'musica', 'imagem') NOT NULL,
ADD COLUMN caminho VARCHAR(255) NOT NULL;

INSERT INTO recursos_educacionais (titulo, descricao, tipo, caminho) VALUES 
('Vídeo Educacional', 'Descrição do vídeo educacional.', 'video', 'videos/video1.mp4'),
('Livro PDF', 'Descrição do livro em PDF.', 'pdf', 'pdfs/livro1.pdf'),
('Música Educacional', 'Descrição da música educacional.', 'musica', 'musicas/musica1.mp3'),
('Imagem Educacional', 'Descrição da imagem educacional.', 'imagem', 'imagens/imagem1.jpg');






