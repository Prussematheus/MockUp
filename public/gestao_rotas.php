<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Rotas</title>
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
        <h1>Gestão de Rotas</h1>
    </div>

    <div class="dashboard-container"> <!--Reutilização da página anterior pois eram semelhantes-->
        <div class="dashboard-fundo">
            <button onclick="gerir_rota_um()" class="dashboard-rota">
                <p class="rota">Joinville: Sul - Zona Industrial</p>
            </button>
            <div class="gestao-rota-um"> <!--Classes numeradas pois a cor deveria ser diferente para cada uma-->
                <i class="fas fa-triangle-exclamation fa-3x"></i>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <button onclick="gerir_rota_dois()" class="dashboard-rota">
                <p class="rota">Joinville: Norte - Sul</p>
            </button>
            <div class="gestao-rota-dois">
                <i class="fas fa-check-circle fa-3x"></i>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <button onclick="gerir_rota_tres()" class="dashboard-rota">
                <p class="rota">Joinville: Norte - Zona Leste</p>
            </button>
            <div class="gestao-rota-tres">
                <i class="fas fa-triangle-exclamation fa-3x"></i>
            </div>
        </div>
    </div>

    <div class="container">
        <button onclick="visualizarMapa()" class="verMapa">Ver Mapa <i class="fas fa-map-location-dot"></i> </button>
    </div>

    <footer class="fixarRodape">

    </footer>

</body>

</html>