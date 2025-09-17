document.addEventListener('DOMContentLoaded', function() {
    
    const btnNotificacao = document.querySelector('.notificacao');
    const painelNotificacao = document.querySelector('.notificacao-painel');
    const btnFechar = document.querySelector('.fechar-notificacao');
    
    btnNotificacao.addEventListener('click', function(e) {
        e.stopPropagation(); 
        painelNotificacao.classList.toggle('ativo');
    });
       
    btnFechar.addEventListener('click', function() {
        painelNotificacao.classList.remove('ativo');
    });
       
    document.addEventListener('click', function(e) {
        if (!painelNotificacao.contains(e.target) && e.target !== btnNotificacao) {
            painelNotificacao.classList.remove('ativo');
        }
    });
    
    painelNotificacao.addEventListener('click', function(e) {
        e.stopPropagation();
    });
}); 


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
};