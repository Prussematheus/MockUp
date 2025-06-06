//Função para aparecer a tela flutuante de notificações ao clicar no ícone

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

function redirecionar_usuario() {
    window.location.href = 'tela_usuario.html';
}

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

if (!validadataNascimento()) {
    valid = false;
}

function validadataNascimento() {
    var dataNascimento = document.getElementById("dataNascimento").value;
    if (!dataNascimento) {
        alert('Por favor, preencha a data de nascimento');
        return false;
    }

    dataNascimento = dataNascimento.replace(/\//g, "-"); 
    var dataNascimento_array = dataNascimento.split("-"); 
            
    if(dataNascimento_array[0].length != 4){
       dataNascimento = dataNascimento_array[2]+"-"+dataNascimento_array[1]+"-"+dataNascimento_array[0]; 
    }

    var hoje = new Date();
    var nasc  = new Date(dataNascimento);
    var idade = hoje.getFullYear() - nasc.getFullYear();
    var m = hoje.getMonth() - nasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
    
    if(idade < 18){
       alert("Insira uma data válida (maior que 18 anos).");
       return false;
    }
    
    return true;
}

function login(){

    var login = document.getElementById('enderecoEmail').value;
    var senha = document.getElementById('senha').value;
    
    if(login == "admin@gmail.com" && senha == "admin"){
        alert('Sucesso');
        location.href = 'bem_vindo.html'
    } else {
        alert('Usuário ou senha incorretos');
    }
}

function gerir_rota_um(){
    window.location.href='gerir_rota_um.html'
}

function gerir_rota_dois(){
    window.location.href='gerir_rota_dois.html'
}

function gerir_rota_tres(){
    window.location.href='gerir_rota_tres.html'
}

function relatorio_um(){
    window.location.href='relatorio_um.html'
}

function relatorio_dois(){
    window.location.href='relatorio_dois.html'
}

function relatorio_tres(){
    window.location.href='relatorio_tres.html'
}