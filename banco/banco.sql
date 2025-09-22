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
('Ana Clara', 'AnaC', 'AnaC@email.com', '54321', '(47) 98888-7777', '222.222.222-22');
('João Silva', 'JoaoS', 'JoaoS@email.com', '09876', '(47) 97777-6666', '333.333.333-33');

CREATE TABLE sensores(
  id_sensor INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tipo_sensor VARCHAR(120) NOT NULL,
  descricao_sensor VARCHAR(255) NOT NULL,
  status_sensor VARCHAR(50) NOT NULL
);

CREATE TABLE sensores_data(
  id_sensor_data INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_sensor INT NOT NULL,
  valor_sensor_data FLOAT NOT NULL,
  data_sensor_data DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_sensor) REFERENCES sensores(id_sensor)
)
