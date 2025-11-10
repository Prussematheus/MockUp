   <?php

        session_start();

        include("../includes/painel_completo.php");
        include("../includes/conexao.php");
        include("../src/Auth.php");
        include("../src/User.php");

        $auth = new Auth();
        $user = new User($conn);

        $currentUser = $user->getUserById($_SESSION['user_id']);


                if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }
        if (!$auth->isLoggedIn()) {
            header("Location: index.php");
            exit;
        }
    

        $msg = "";

    ?>


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
            <h3 class="titulo">Sistema Ferroviário </h3>
            </button>
            <a class="perfil" href="../public/tela_usuario.php"> <!--Redireciona o usuário para a tela de personalização de informações-->
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
            </a>
        </div>


    </header>

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
                <i class="fas fa-user-plus fa-2x" style="color: #ffffff;"></i>
                <p class="nomeOpcao">Cadastrar novo funcionário</p>
            </button>
        </a>

    </div>

    <p><a href="?logout=1">Sair</a></p>

    <footer class="fixarRodape">


    </footer>

</body>

</php>
