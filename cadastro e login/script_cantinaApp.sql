create database cantinaApp;
use cantinaApp;

CREATE TABLE usuario (
  `idUsuario` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL
)