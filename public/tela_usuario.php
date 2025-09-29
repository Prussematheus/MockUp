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
        header("Location: login.php");
        exit();
        }

        $msg = "";

    ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Usuário</title>
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

    <form id="formUsuario">

        <div class="form-section">  <!--Form para alteração de informações do usuário caso necessário-->
            <h2>Dados da Conta</h2>
                <div class="form-group">
                    <label for="nomeCompleto">Nome completo:</label>
                    <input type="text" id="nomeCompleto" placeholder="Insira seu nome completo" required>
                </div>

                <div class="form-group">
                    <label for="email">Endereço de e-mail:</label>
                    <input type="email" id="email" placeholder="Insira seu endereço de e-mail" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" placeholder="Insira seu número de telefone" pattern="[0-9]{11}" required>
                </div>

                <div class="form-group">
                    <label for="dataNascimento">Data de nascimento:</label>
                    <input type="date" id="dataNascimento" required>
                    <button type="button" onclick='return validadataNascimento()'>Validar data</button> <!--Ao clicar no botão, a data é validada-->

                </div>
            </div>

            <div class="container">
                <label for="confirmar"></label>
                <input type="submit" id="confirmar_alteracoes" value="Confirmar Alterações">
            </div>



        </form>


    <footer class="fixarRodape">

    </footer>


