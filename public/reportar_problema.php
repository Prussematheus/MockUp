<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Problema</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../javascript/script.js"></script>

</head>

<body>

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
        <h1>Reportar Problema</h1>
    </div>

    <div class="container">
        <div class="descreva">
            Descreva o bug ocorrido no aplicativo:
        </div>
    </div>

    <div class="container">
        <form id="formManutencao">
            <!--Semelhante ao form do bloqueio de rota porém com uma descrição da localização exata do problema para a equipe de manutenção atuar-->
            <div class="container">
                <textarea class="problema" placeholder="Descreva o problema ocorrido..."></textarea>
            </div>
            <div class="container">
                <p class="confidencial">Não inclua informações confidenciais</p> <i class="far fa-question-circle"></i>
            </div>
            <div class="imagem_problema">
                <p class="insira-imagem">Se possível insira uma imagem do problema para auxiliar a manutenção.</p>
            </div>
            <div class="container">
                <form action="/upload" method="post" enctype="multipart/form-data">
                    <label for="imagem">Anexar imagem</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*" required>
            </div>

            <div class="container">
                <input type="submit" class="enviar"></button>
            </div>

    </div>

    </form>
    </form>
    </div>