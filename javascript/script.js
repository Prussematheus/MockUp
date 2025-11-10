//Função para aparecer a tela flutuante do menu ao clicar no ícone

document.addEventListener('DOMContentLoaded', function() {
    
    const btnMenu = document.querySelector('.menu');
    const menuPainel = document.querySelector('.menu-painel');
    const btnFecharMenu = document.querySelector('.fechar-menu');
    
    btnMenu.addEventListener('click', function(e) {
        e.stopPropagation(); 
        menuPainel.classList.add('ativo');
    });
    
    btnFecharMenu.addEventListener('click', function() {
        menuPainel.classList.remove('ativo');
    });
    
    document.addEventListener('click', function(e) {
        if (!menuPainel.contains(e.target) && e.target !== btnMenu) {
            menuPainel.classList.remove('ativo');
        }
    });
    
    menuPainel.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});

// Validação para a tela de personalização de informações do usuário

var nomeCompleto = document.getElementById('nomeCompleto');
var email = document.getElementById('email');
var telefone = document.getElementById('telefone');
var dataNascimento = document.getElementById('dataNascimento');

let valid = true;

if (nomeCompleto.value.trim() === '') {
    alert('Por favor, preencha seu nome');
    valid = false;
}

var telefoneRegex = /^\d{11}$/;
if (!telefoneRegex.test(telefone.value)) {
    alert('Telefone deve conter 11 dígitos (DDD + número)');
    valid = false;
}

if (email.value !== '') {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        alert('Por favor, insira um e-mail válido');
        valid = false;
    }
}

// Funções de redirecionamento de página

function gerir_rota_um(){
    window.location.href='gerir_rota_um.php'
}

function gerir_rota_dois(){
    window.location.href='gerir_rota_dois.php'
}

function gerir_rota_tres(){
    window.location.href='gerir_rota_tres.php'
}

function relatorio_um(){
    window.location.href='relatorio_um.php'
}

function relatorio_dois(){
    window.location.href='relatorio_dois.php'
}

function relatorio_tres(){
    window.location.href='relatorio_tres.php'
}

function visualizarMapa(){
    window.location.href='mapa.php'
}

function redirecionar_usuario() {
    window.location.href = 'tela_usuario.php';
}

async function consultarCEP() {
    const cep = document.getElementById('cep').value.replace(/\D/g, '');
    const statusElement = document.querySelector('.cep-status');
    
    if (cep.length !== 8) {
        statusElement.textContent = 'CEP deve ter 8 dígitos';
        statusElement.style.color = 'red';
        return;
    }

    statusElement.textContent = 'Consultando...';
    statusElement.style.color = 'blue';

    try {
        // Tenta ViaCEP primeiro
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
            // Fallback para BrasilAPI
            await consultarBrasilAPI(cep);
        } else {
            preencherCampos(data);
            statusElement.textContent = '✓ CEP válido';
            statusElement.style.color = 'green';
        }
    } catch (error) {
        await consultarBrasilAPI(cep);
    }
}

async function consultarBrasilAPI(cep) {
    const statusElement = document.querySelector('.cep-status');
    
    try {
        const response = await fetch(`https://brasilapi.com.br/api/cep/v1/${cep}`);
        const data = await response.json();
        
        if (data.errors) {
            throw new Error('CEP não encontrado');
        }
        
        // Adapta formato BrasilAPI para ViaCEP
        const dadosAdaptados = {
            logradouro: data.street,
            bairro: data.neighborhood,
            localidade: data.city,
            uf: data.state
        };
        
        preencherCampos(dadosAdaptados);
        statusElement.textContent = '✓ CEP válido (BrasilAPI)';
        statusElement.style.color = 'green';
    } catch (error) {
        statusElement.textContent = '❌ CEP não encontrado';
        statusElement.style.color = 'red';
        limparCampos();
    }
}

function preencherCampos(dados) {
    document.getElementById('logradouro').value = dados.logradouro || '';
    document.getElementById('bairro').value = dados.bairro || '';
    document.getElementById('cidade').value = dados.localidade || '';
    document.getElementById('uf').value = dados.uf || '';
}

function limparCampos() {
    document.getElementById('logradouro').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('cidade').value = '';
    document.getElementById('uf').value = '';
}