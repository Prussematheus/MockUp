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

CREATE TABLE relatorios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data_relatorio DATETIME NOT NULL,
    usuario VARCHAR(100) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
);

INSERT INTO usuarios (nome_funcionario, nome_usuario, email_usuario, data_nascimento, senha_usuario, telefone_usuario, cpf_usuario, administrador, cep_usuario, logradouro_usuario, bairro_usuario, cidade_usuario, uf_usuario) VALUES
('Lucas Kormann', 'LucasK', 'lucasK@gmail.com', '2007/09/23', '$2y$10$MYYCwQ3hyfmhV2ZhLSl1f.OLGaR2J2IOjYfrShvbopa7TBV/VoKPG', '(47) 99919-3898', '131.115.069-24', '1', '89201-266', 'Rua Orestes Guimarães', 'Centro', 'Joinville', 'SC');

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