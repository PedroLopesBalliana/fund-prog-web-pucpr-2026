--BD 'lojaDeLivros'
CREATE DATABASE lojaDeLivros;
USE lojaDeLivros;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE 


-- Criação da tabela de Autores
CREATE TABLE Autores (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(50),
    ano_nascimento INT
);



-- Criação da tabela de Livros
CREATE TABLE Livros (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50),
    ano_publicacao INT,
    descricao TEXT,
    id_autor INT,
    FOREIGN KEY (id_autor) REFERENCES Autores(id_autor)
);





INSERT INTO Autores (nome, nacionalidade, ano_nascimento)
VALUES 
('Victor Hugo', 'Francês', 1802),
('Fiódor Dostoiévski', 'Russo', 1821),
('Gabriel García Márquez', 'Colombiano', 1927),
('Harper Lee', 'Americana', 1926),
('Thomas Mann', 'Alemão', 1875),
('Eiji Yoshikawa', 'Japonês', 1892);



INSERT INTO Livros (titulo, genero, ano_publicacao, descricao, id_autor)
VALUES
('Os Miseráveis', 'Romance', 1862, 'Clássico da literatura francesa que aborda justiça social e redenção.', 1),
('Crime e Castigo', 'Romance psicológico', 1866, 'Obra-prima russa que explora culpa, moral e redenção.', 2),
('Cem Anos de Solidão', 'Realismo mágico', 1967, 'Romance colombiano que narra a saga da família Buendía.', 3),
('O Sol é pra Todos', 'Drama', 1960, 'Livro americano que trata de racismo e justiça no sul dos EUA.', 4),
('A Montanha Mágica', 'Romance', 1924, 'Obra alemã que reflete sobre tempo, doença e filosofia.', 5),
('Musashi', 'Histórico', 1935, 'Romance japonês épico sobre o samurai Miyamoto Musashi.', 6);



-- Criação da tabela de Clientes
CREATE TABLE Clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    data_nascimento VARCHAR(20),
    endereco VARCHAR(150),
    cidade VARCHAR(100),
    estado VARCHAR(50)
);



-- Criação da tabela de Pedidos
CREATE TABLE Pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    data_pedido DATE DEFAULT CURRENT_DATE,
    valor_total DECIMAL(10, 2) NOT NULL,
    id_cliente INT,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
);



-- Inserindo clientes
INSERT INTO Clientes (nome, email, celular, data_nascimento, endereco, cidade, estado)
VALUES ('João Silva', 'joao@email.com', '(41) 99999-1234', '1990-05-12', 'Rua das Flores, 123', 'Curitiba', 'PR');

INSERT INTO Clientes (nome, email, celular, data_nascimento, endereco, cidade, estado)
VALUES ('Maria Oliveira', 'maria@email.com', '(11) 98888-5678', '1985-09-30', 'Av. Paulista, 456', 'São Paulo', 'SP');



-- Inserindo pedidos
INSERT INTO Pedidos (data_pedido, valor_total, id_cliente)
VALUES ('2023-01-15', 150.00, 1);

INSERT INTO Pedidos (data_pedido, valor_total, id_cliente)
VALUES ('2023-01-16', 200.00, 2);


-- Criação da tabela de Usuários
CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    telefone VARCHAR(20),
    login VARCHAR(50) UNIQUE,
    senha VARCHAR(255) -- senha criptografada
);

-- Inserindo usuários
INSERT INTO Usuario (nome, telefone, login, senha)
VALUES ('Joao da Silva', '(41) 99999-1234', 'joao', MD5('minhaSenha123'));