CREATE DATABASE barrefertas;
USE barrefertas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    nome VARCHAR(100),
    senha VARCHAR(255)
);

CREATE TABLE ofertas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    nome VARCHAR(100),
    descricao TEXT,
    foto VARCHAR(255),
    link VARCHAR(255),
    valor DECIMAL(10,2)
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_oferta INT,
    comentario TEXT
);
