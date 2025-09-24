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
('Lucas Kormann', 'LucasK', 'lucasK@gmail.com', '12345', '(47) 99919-3898', '131.115.069-24'),
('Ana Clara', 'AnaC', 'AnaC@email.com', '54321', '(47) 98888-7777', '222.222.222-22'),
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
  valor_sensor FLOAT NOT NULL,
  data_sensor DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_sensor) REFERENCES sensores(id_sensor)
)

INSERT INTO sensores (tipo_sensor, descricao_sensor, status_sensor) VALUES
('Temperatura', 'Sensor de temperatura para monitorar a temperatura ambiente', 'Ativo'),
('Umidade', 'Sensor de umidade para medir a umidade do ar', 'Ativo'),
('Pressão', 'Sensor de pressão para monitorar a pressão atmosférica', 'Inativo');

INSERT INTO sensores_data (id_sensor, valor_sensor, data_sensor) VALUES
(1, 22.5, '2024-06-01 10:00:00'),
(1, 23.0, '2024-06-01 11:00:00'),
(2, 45.0, '2024-06-01 10:00:00'),
(2, 50.0, '2024-06-01 11:00:00'),
(3, 1013.25, '2024-06-01 10:00:00'),
(3, 1012.80, '2024-06-01 11:00:00');