<!DOCTYPE php>
<php lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!--Utilização do Fontawesome para ícones no trabalho-->
    <script src="../javascript/script.js"></script>
</head>


<body>


    <header>


        <div id="header">
            <button class="menu"> <!--Botão de menu-->
                <i class="fas fa-bars fa-2x" style="color: white;"></i>
            </button>
            <h3 class="titulo">Sistema Ferroviário</h3>
            <button class="notificacao">
                <i class="fas fa-bell fa-2x" style="color: white;"></i>
            </button>
            <a class="perfil" href="../public/tela_usuario.php"> <!--Redireciona o usuário para a tela de personalização de informações-->
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
</a>
        </div>


    </header>

    <?php

        session_start();

        if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
        exit;
        }

        $msg = "";



    ?>

    <div class="notificacao-painel"> <!--Div do painel de notificações (inicialmente oculto)-->
        <div class="notificacao-cabecalho">
            <h4>Notificações</h4>
            <button class="fechar-notificacao">&times;</button> <!--Botão para fechar o painel de notificações.-->
        </div>
        <div class="notificacao-lista">
            <div class="notificacao-item"> <!--Define os itens (notificações) do painel-->
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


    <div class="espacamento"></div> <!--Apenas um espaçamento com a cor cinza-->

    <div id="bemVindo">
        <h1>Bem vindo Usuário(a)</h1>
        <h4>ao Sistema Ferroviário</h3>
            <i class="fas fa-train fa-5x"></i>
    </div>

    <div class="opcoes"> <!--Lista de botões da página inicial-->
        <a style="text-decoration: none;" href="../public/dashboard.php">
            <button class="opcao">
                <i class="fas fa-chart-line fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Dashboard Geral</p>
            </button>
        </a>

        <a style="text-decoration: none;" href="../public/gestao_rotas.php">
            <button class="opcao">
                <i class="fas fa-map-marker-alt fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Gerenciar as Rotas</p>
            </button>
        </a>

        <a style="text-decoration: none;" href="../public/reportar_problema.php"> <!--Ainda não fizemos essa página-->
            <button class="opcao">
                <i class="fas fa-star fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Reportar Problema</p>
            </button>
        </a>

        <a style="text-decoration: none;" href="../public/visualizar_relatorios.php"> <!--Ainda não fizemos essa página-->
            <button class="opcao">
                <i class="fas fa-file fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Relatórios e Análises</p>
            </button>
        </a>

        <a style="text-decoration: none;" href="../public/cadastro.php"> <!--Ainda não fizemos essa página-->
            <button class="opcao">
                <i class="fas fa-file fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Cadastrar novo funcionário</p>
            </button>
        </a>

    </div>

    <p><a href="?logout=1">Sair</a></p>

    <footer class="fixarRodape">


    </footer>

</body>

</php>
