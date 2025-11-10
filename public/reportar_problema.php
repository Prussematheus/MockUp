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