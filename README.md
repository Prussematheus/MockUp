🔹Descrição do projeto:

O Sistema Ferroviário IoT é uma plataforma web desenvolvida em PHP para monitoramento de sensores conectados a um sistema ferroviário. Ele recebe dados enviados por um broker MQTT (como HiveMQ ou Mosquitto), grava as informações no banco de dados e exibe tudo em um dashboard simples e funcional.

O projeto foi pensado para ser modular, escalável e de fácil manutenção, permitindo integrar novos sensores e relatórios com facilidade.

🔹Como utilizar:

- Clone este repositório fornecido no GitHub
- Inicie o XAMPP e crie o banco de dados, copiando as tabelas fornecidas
- Para o login, o banco de dados já vem com um usuário, sendo o admin@gmail.com, e a senha é '12345'
- Para o funcionamento adequado do sistema, é necessário criar um arquivo dentro da pasta "includes" com o nome "env.h"
- Neste arquivo, deve ser colocado as seguintes informações:

MQTT_SERVER=
MQTT_PORT=
MQTT_USERNAME=
MQTT_PASSWORD=

- Preencha cada um desses requisitos com os seus próprios dados, e o sistema deverá funcionar normalmente
- Após isso, é necessário abrir o localhost e acessar a pasta na qual foi salvo o repositório e fazer o login com o usuário supracitado 

🔹Funcionalidades:

Monitoramento em Tempo Real

Consumo de mensagens MQTT (ex: velocidade do trem)

Salvamento automático no banco de dados

Dashboard mostrando:

Velocidade atual

Horário da última atualização

Data da última atualização

🔹 Sistema de Usuários

Cadastro e login de funcionários

Controle de permissões (administrador)

Informações como foto de perfil, endereço, CPF e telefone

🔹 Gerenciamento de Relatórios

Usuários podem registrar relatórios de:

Problemas no sistema

Problemas no ferrorama

Relatórios ficam associados ao usuário responsável

🔹 Histórico de Sensores

Tabela própria para registrar todos os dados recebidos via MQTT

Formatado para consultas futuras e análises

🔹Tecnologias Utilizadas:

PHP 8+

MySQL

MQTT (HiveMQ)

HTML / CSS / JS

Font Awesome

OpenSSL (para conexão TLS no MQTT)

🔹 API de consulta de CEP

APIs Utilizadas:

Primária: ViaCEP - https://viacep.com.br/
Secundária: BrasilAPI - https://brasilapi.com.br/ (Em caso de erro da primária)

Endpoints: 

- ViaCEP: `GET https://viacep.com.br/ws/{cep}/json/`
- BrasilAPI: `GET https://brasilapi.com.br/api/cep/v1/{cep}`

Como Testar
- Front-end: Digite um CEP válido (ex: 01001000)
- Back-end: Use o CEPValidator::validarCEP('01001000')
- Teste CEPs inválidos: 00000000, 99999999

Fluxo
- Usuário digita CEP → consulta ViaCEP
- Se falhar → consulta BrasilAPI
- Se sucesso → preenche campos automaticamente
- Back-end valida novamente no cadastro
- Registra auditoria da consulta

Tratamento de Erros
- CEP inválido (≠ 8 dígitos)
- CEP não encontrado
- APIs indisponíveis
- Timeout (5 segundos)