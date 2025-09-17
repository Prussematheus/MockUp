<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../javascript/script.js"></script>

</head>

<body>

    <header>


        <div id="header">
            <button class="menu">
                <i class="fas fa-bars fa-2x" style="color: white;"></i>
            </button>
            <h3 class="titulo">Sistema Ferroviário</h3>
            <button class="notificacao">
                <i class="fas fa-bell fa-2x" style="color: white;"></i>
            </button>
            <button class="perfil" onclick="redirecionar_usuario()">
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
            </button>
        </div>


    </header>


    <div class="notificacao-painel">
        <div class="notificacao-cabecalho">
            <h4>Notificações</h4>
            <button class="fechar-notificacao">&times;</button>
        </div>
        <div class="notificacao-lista">
            <div class="notificacao-item">
                <i class="fas fa-train"></i>
                <div>
                    <p>Trem #1245 atrasado em 15 minutos</p>
                    <small>Há 2 horas</small>
                </div>
            </div>
            <div class="notificacao-item">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <p>Manutenção programada para a linha 3</p>
                    <small>Ontem, 14:30</small>
                </div>
            </div>
        </div>
    </div>

        <div class="menu-painel"> <!--Painel do menu (inicalmente oculto)-->
        <div class="menu-cabecalho">
            <button class="fechar-menu">&times;</button> <!--Botão para fechar o menu-->
        </div>
        <div class="menu-lista"> <!--Define cada item que terá no menu-->
            <a href="../public/bem_vindo.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-house" style="color: #004aad;"></i>
                    <div>
                        <p>Início</p>
                    </div>
                </div>
            </a>
            <a href="../public/dashboard.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-chart-line" style="color: #004aad;"></i>
                    <div>
                        <p>Dashboard Geral</p>
                    </div>
                </div>
            </a>
            <a href="../public/gestao_rotas.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-map-marker-alt" style="color: #004aad;"></i>
                    <div>
                        <p>Gestão de Rotas</p>
                    </div>
                </div>
            </a>
            <a href="../public/reportar_problema.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-star fa" style="color: #004aad;"></i>
                    <div>
                        <p>Reportar Problema</p>
                    </div>
                </div>
            </a>
            <a href="../public/visualizar_relatorios.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-file" style="color: #004aad;"></i>
                    <div>
                        <p>Relatórios e análises</p>
                    </div>
                </div>
            </a>

            <a href="?logout=1" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-sign-out-alt" style="color: #004aad;"></i>
                    <div>
                        <p>Sair</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Relatório</h1>
    </div>

    <div class="container">
        <div class="descreva">
            Joinville : Norte - Sul
        </div>
    </div>

    <div class="container"> <!--Form para justificar o bloqueio da rota-->
        <form id="formBloquear">
            <div class="form-justificativa">
                <textarea class="justificativa" placeholder="A rota Norte - Sul está com a manutenção em dia e em pleno funcionamento."></textarea>
            </div>
    </div>
    <div class="container">
        <p class="insira-imagem"></p>
    </div>
    <div class="container"> <!--Seção do form para anexação de imagem do problema-->
    <form action="/upload" method="post" enctype="multipart/form-data">
        <label for="imagem">Visualizar imagem do problema</label>
        <input 
            type="file" 
            id="imagem" 
            name="imagem"
            accept="image/*" 
            required
        >
    </div>
    </form>
    </form>
    </div>

    <footer class="fixarRodape">

    </footer>