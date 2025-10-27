Professor, apenas para esclarecimento, nosso projeto começa na tela de login, que já está validado.
O email para ser utilizado de login é "lucasK@gmail.com" e a senha é "12345".

API de consulta de CEP

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