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
    <title>Visualizar Relatórios</title>
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
            
                
            </button>
            <button class="perfil" onclick="redirecionar_usuario()">
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
            </button>
        </div>


    </header>
    
    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Visualizar Relatórios</h1>
    </div>

    <div class="dashboard-container"> <!--Container para centralização-->
        <div class="dashboard-fundo"> <!--Divs para estilização com cores de fundo e posicionamento-->
            <button onclick="relatorio_um()" class="relatorio-rota">
                <p class="rota">Ver relatório - Joinville: Sul - Zona Industrial</p> 
            </button>
           
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo"> <!--Uso da mesma classe do dashboard, já que são páginas parecidas-->
            <button onclick="relatorio_dois()" class="relatorio-rota">
                <p class="rota">Ver relatório - Joinville: Norte - Sul</p>
            </button>
        </div>
    </div>
    

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <button onclick="relatorio_tres()" class="relatorio-rota">
                <p class="rota">Ver relatório - Joinville: Norte - Zona Leste</p>
            </button>
        </div>
    </div>
    

    <div class="container"> <!--Botão de ver mais caso seja necessário-->
        <button class="verMais">Ver Mais <i class="fas fa-chevron-down"></i></button> 
    </div>

    <footer class="fixarRodape">

    </footer>

</body>

</html>