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
        } elseif (empty($_SESSION["user_id"])) {
            header("Location: index.php");
            exit;
        }

         include("painel_completo.php");
        

        $msg = "";

    ?>

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
