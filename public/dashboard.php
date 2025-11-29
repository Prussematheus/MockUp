<?php

        session_start();
        
        include("../includes/painel_completo.php");
        include("../includes/conexao.php");
        include("../src/Auth.php");
        include("../src/User.php");
        include("../src/broker.php");

        $auth = new Auth();
        $user = new User($conn);
        $broker = new Broker($conn);

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

        $mensagem_vel = $_SESSION['resposta_vel'] ?? '';

        if (!empty($mensagem_vel)) {
            $ultima = end($mensagem_vel);
            $broker->saveHist("IoT/trem/velocidade", $ultima['msg'], $ultima['time']);
            $vel_atual_msg  = $ultima['msg'];
            $vel_atual_time = $ultima['time'];
            $vel_atual_date = $ultima['date'];
        } else {
            $vel_antigo = $broker->dataVel();
            $vel_atual_msg  = $vel_antigo['msg_anterior'];
            $vel_atual_time = $vel_antigo['time_anterior'];
            $vel_atual_date = $vel_antigo['date_anterior'];
        }


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

    <div class="centralizar">
        <div class="info-card">
            <h2 style="text-align: center;">Velocidade do trem:</h2>
            <?php
            $displayVel = htmlspecialchars($vel_atual_msg);
            $displayVelTime = htmlspecialchars($vel_atual_time);
            $dateObj = new DateTime($vel_atual_date);
            $displayVelDate = $dateObj->format('d/m/Y');
            ?>
            <p><?php echo $displayVel; ?>Km/H</p>
            <h2 style="text-align: center;">Horário:</h2>
            <p><?php echo $displayVelTime; ?></p>
            <h2 style="text-align: center;">Data:</h2>
            <p><?php echo $displayVelDate; ?></p>
        </div>
    </div>

    <div class="centralizar">
        <a href="../src/get_messages.php" class="atualizar-pagina">Atualizar Página</a>
    </div>

    <footer class="fixarRodape"></footer>
    

</body>

</html>