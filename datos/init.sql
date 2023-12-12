CREATE DATABASE IF NOT EXISTS usuariosdb;
USE usuariosdb;
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    tipocesta  VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre,correo,tipocesta) VALUES 
    ("Juana","jmrg250894@gmail.com","CONJAMON"),
    ("Manolo","1bjuanarodriguez@gmail.com","SINJAMON");