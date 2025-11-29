CREATE DATABASE sa_transporte;

USE sa_transporte;

CREATE TABLE usuarios(
  id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_funcionario VARCHAR(120) NOT NULL,
  nome_usuario VARCHAR(120) NOT NULL,
  email_usuario VARCHAR(255) NOT NULL UNIQUE,
  data_nascimento DATE NOT NULL,
  senha_usuario VARCHAR(255) NOT NULL,
  telefone_usuario VARCHAR(15) NOT NULL,
  cpf_usuario VARCHAR(14) NOT NULL UNIQUE,
  administrador BOOLEAN NOT NULL DEFAULT FALSE,
  cep_usuario VARCHAR (9) NOT NULL,
  logradouro_usuario VARCHAR(255) NOT NULL,
  bairro_usuario VARCHAR(255) NOT NULL,
  cidade_usuario VARCHAR(255) NOT NULL,
  uf_usuario VARCHAR(255) NOT NULL,
  foto_perfil VARCHAR(255) DEFAULT 'default.jpg'
);

CREATE TABLE relatorios(
  id_relatorio INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_relatorio VARCHAR(255) NOT NULL,
  conteudo_relatorio TEXT NOT NULL,
  tipo_relatorio ENUM('bug_sistema', 'problema_ferrorama') NOT NULL DEFAULT 'problema_ferrorama',
  data_relatorio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  autor_relatorio INT NOT NULL,
  FOREIGN KEY (autor_relatorio) REFERENCES usuarios(id_usuario)
);

CREATE TABLE historico_sensores(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
topic VARCHAR(45) NOT NULL,
msg VARCHAR(45) NOT NULL,
time TIME NOT NULL,
date DATE DEFAULT (CURDATE())
);

INSERT INTO usuarios (nome_funcionario, nome_usuario, email_usuario, data_nascimento, senha_usuario, telefone_usuario, cpf_usuario, administrador, cep_usuario, logradouro_usuario, bairro_usuario, cidade_usuario, uf_usuario) VALUES
('Lucas Kormann', 'LucasK', 'lucasK@gmail.com', '2007/09/23', '$2y$10$MYYCwQ3hyfmhV2ZhLSl1f.OLGaR2J2IOjYfrShvbopa7TBV/VoKPG', '(47) 99999-9999', '222.222.222-22', '1', '89201-266', 'Rua Orestes Guimarães', 'Centro', 'Joinville', 'SC');

INSERT INTO Historico_sensores (topic, msg, time) VALUES
('IoT/trem/velocidade','50','12:36:42');

INSERT INTO relatorios (nome_relatorio, conteudo_relatorio, autor_relatorio) 
VALUES ('Relatório de Problema No Trem do Ferrorama', 'Este relatório apresenta um problema ocorrido no sensor do trem (S4), por favor corrigir o mais rápido possível.', 1);

