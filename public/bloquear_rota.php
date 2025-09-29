   <?php

        session_start();

        $auth = new Auth();
        $user = new User($conn);


        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        } elseif (!$auth->isLoggedIn()) {
        header("Location: index.php");
        exit();
        }

        $currentUser = $user->getUserById($_SESSION['user_id']);


        include("../includes/painel_completo.php");
        include("../includes/conexao.php");
        include("../src/Auth.php");
        include("../src/User.php");

        $msg = "";

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloquear Rota</title>
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


    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Bloquear Rota</h1>
    </div>

    <div class="container">
        <div class="descreva">
            Descreva o motivo pelo qual a rota deve ser bloqueada:
        </div>
    </div>

    <div class="container"> <!--Form para justificar o bloqueio da rota-->
        <form id="formBloquear">
            <div class="form-justificativa">
                <textarea class="justificativa" placeholder="Diga o problema ocorrido na rota..."></textarea>
            </div>
    </div>
    <div class="container">
        <p class="insira-imagem">Se possível insira uma imagem do problema que houve na rota.</p>
    </div>
    <div class="container"> <!--Seção do form para anexação de imagem do problema-->
    <form action="/upload" method="post" enctype="multipart/form-data">
        <label for="imagem">Anexar imagem</label>
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

    <div class="container"> <!--Botão para enviar-->
        <button class="enviar">Enviar</button>
    </div>



    <footer class="fixarRodape">

    </footer>