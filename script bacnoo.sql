create database lanches;
use lanches;

CREATE TABLE lanche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nomelanche VARCHAR(255) NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL,
    Descricao TEXT
);

CREATE TABLE FUNCIONARIO (
id int primary key auto_increment not null,
nome varchar(50) not null,
email varchar(40) not null,
senha char(20) not null,
confirmarSenha char(20) not null

);
