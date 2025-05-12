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

