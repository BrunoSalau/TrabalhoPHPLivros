CREATE DATABASE sistema_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE sistema_crud;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(120) NOT NULL,
    editora VARCHAR(120) NOT NULL,
    ano_publicacao INTEGER NOT NULL,
    genero VARCHAR(80) NOT NULL
);