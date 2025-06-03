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

document.getElementById('formLogin').addEventListener( 'submit', function(event) {
    event.preventDefault();

    if(validarFormulario()) {
        this.submit() ;
    }
}) ;

function validarFormulario() { //Validação de email do login
    var email = document.getElementById('enderecoEmail');
    if (email.value !== '') {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            alert('Por favor, insira um e-mail válido');
            valid = false;
        }
    }
}

function redirecionar_bem_vindo() { //Função para redirecionar o botão de login para a página de bem vindo
    window.location.href = 'bem_vindo.html';
}

function redirecionar_usuario() {
    window.location.href = 'tela_usuario.html';
}

var nomeCompleto = document.getElementById('nomeCompleto');
var email = document.getElementById('email');
var telefone = document.getElementById('telefone');
var dataNascimento = document.getElementById('dataNascimento');

let valid = true;

if (nomeCompleto.value.trim() === '') {
    alert('Por favor, preencha o nome do cliente');
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

validadataNascimento();