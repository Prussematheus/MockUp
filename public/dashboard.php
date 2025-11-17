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
        } elseif (!$auth->isLoggedIn()) {
        header("Location: index.php");
        exit();
        }
        
        $msg = "";


    ?>

<!DOCTYPE html>
<html lang="en">

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

    
    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Dashboard Geral</h1>
    </div>

    <div class="dashboard-container"> <!--Container para centralização-->
        <div class="dashboard-fundo"> <!--Divs para estilização com cores de fundo e posicionamento-->
            <div class="dashboard-rota">
                <p class="rota">Joinville: Sul - Zona Industrial</p> 
            </div>
            <div class="dashboard-horario-um">
                <p>12:30</p>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <div class="dashboard-rota">
                <p class="rota">Joinville: Norte - Sul</p>
            </div>
            <div class="dashboard-horario-dois">
                <p>13:00</p>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <div class="dashboard-rota">
                <p class="rota">Joinville: Norte - Zona Leste</p>
            </div>
            <div class="dashboard-horario-tres">
                <p>14:00</p>
            </div>
        </div>
    </div>

    <footer class="fixarRodape">

    </footer>

</body>

</html>