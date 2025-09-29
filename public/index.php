<?php

    session_start();

    if (!empty($_SESSION["user_id"])){ 
        header("Location: bem_vindo.php"); 
    }

    include("../includes/painel_completo.php");
    include("../includes/conexao.php");
    include("../src/Auth.php");
    include("../src/User.php");

    $msg = "";

    


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = new User($conn);
    $auth = new Auth();

    $loggedInUser = $user->login($_POST['email_usuario'], $_POST['senha']);
    
    if($loggedInUser) {
        $auth->loginUser($loggedInUser);
        header("Location: bem_vindo.php");
        exit;
    } else{
        echo "Login Falhou! Verifique seu e-mail e senha.";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header>

    <div id="header">
        <h3 class="tituloLogin">Sistema Ferroviário</h3>
</header>

<main>

    

    <div class="espacamento"></div>

    <div id="bemVindo">
        <h1>Bem Vindo de Volta!</h1>
        <i class="fas fa-train fa-5x"></i>
    </div>
    <p class="inserir">Por favor insira suas informações para Login</p>

    <div class='container'>
        <form method="POST" id="formLogin">
            <div class="form-section">
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" id="email_usuario" name="email_usuario" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>          
            </div>
            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>

    <footer class="fixarRodape">
        
    </footer>
</main>    
</body>
</html>