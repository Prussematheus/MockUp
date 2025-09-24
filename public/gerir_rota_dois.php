<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Rota</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../javascript/script.js"></script>

</head>

    <?php

        session_start();

        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        } elseif (empty($_SESSION["user_id"])) {
            header("Location: index.php");
            exit;
        }

         include("painel_completo.php");
        

        $msg = "";

    ?>

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
        <h1>Gerir Rota</h1>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <div class="dashboard-rota">
                <p class="rota">Joinville: Norte - Sul</p>
            </div>
            <div class="gestao-rota-dois">
                <i class="fas fa-check-circle fa-3x"></i>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="rota-status"> <!--Mostra o status da rota-->
            <p class="status">Status: Operacional</p>
        </div>
    </div>

    <div class="container"> <!--Botão para mudar o status caso necessite de manutenção ou se a manutenção já tiver sido realizada-->
        <button class="mudar-status">Mudar Status</button>
    </div>

    <div class="container"> <!--Botão para solicitar manutenção-->
        <button class="solicitar-manutencao">Solicitar Manutenção</button>
    </div>

    <div class="container"> <!--Botão para o bloqueio de rotas-->
        <button class="bloquear-rota">Bloquear Rota</button>
    </div>

    <footer class="fixarRodape">

    </footer>