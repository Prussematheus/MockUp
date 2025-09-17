CREATE DATABASE sa_transporte;

USE sa_transporte;

CREATE TABLE usuarios(
  id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_funcionario VARCHAR(120) NOT NULL,
  nome_usuario VARCHAR(120) NOT NULL,
  email_usuario VARCHAR(255) NOT NULL,
   senha_usuario VARCHAR(255) NOT NULL,
  telefone_usuario VARCHAR(15) NOT NULL,
  cpf_usuario VARCHAR(14) NOT NULL
);


INSERT INTO usuarios (nome_funcionario, nome_usuario, email_usuario, senha_usuario, telefone_usuario, cpf_usuario) VALUES
('Lucas Kormann', 'LucasK', 'lucasK@gmail.com', '12345', '(47) 99919-3898', '131.115.069-24');
