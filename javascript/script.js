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

