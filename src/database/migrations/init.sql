CREATE DATABASE IF NOT EXISTS sistema_alarmes;
USE sistema_alarmes;

CREATE TABLE IF NOT EXISTS equipamentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    numero_serie VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL,
    dh_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS alarmes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    equipamento_id INT NOT NULL,
    descricao TEXT NOT NULL,
    situacao VARCHAR(1) NOT NULL DEFAULT 'I',
    classificacao VARCHAR(255) NOT NULL,
    dh_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id)
);

CREATE TABLE IF NOT EXISTS alarmes_atuados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alarme_id INT NOT NULL,
    dh_inicio DATETIME NOT NULL,
    dh_fim DATETIME NULL,
    FOREIGN KEY (alarme_id) REFERENCES alarmes(id)
);