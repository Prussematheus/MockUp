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


    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Relatório</h1>
    </div>

    <div class="container">
        <div class="descreva">
            Joinville : Norte-Zone Leste
        </div>
    </div>

    <div class="container"> <!--Form para justificar o bloqueio da rota-->
        <form id="formBloquear">
            <div class="form-justificativa">
                <textarea class="justificativa" placeholder="A rota Norte - Zona Leste está com um problema fatal nos trilhos, podendo causar um acidente grave, a manutenção já foi solicitada e será realizada no dia XX/XX/XX, sendo de caráter urgente para a volta do funcionamento na rota."></textarea>
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