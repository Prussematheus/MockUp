<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    <div id="titulo">
        <h3>Sistema Ferroviário</h3>
    </div>
</header>
    <div class="espacamento"></div>

    <div id="relatório">
        <h1>Esqueceu Sua Senha?</h1>
        <i class="fas fa-train fa-5x"></i>
    </div>
    
    
    <p class="inserir">Insira seu Email para a recuperação de sua senha</p>

    <div class= 'container'> 
        <form id="formLogin"> <!--Form para recuperação de senha-->
            <div class="form-section">
                <div class="form-group">
                    <label for="enderecoEmail"></label>
                    <input type="email" id="enderecoEmail" placeholder="E-mail" required>
                </div>
                
            </div>

            <div class="container">
                <label for="Login"></label>
                <input type="submit" class="btn" value="ENVIAR">
            </div>
                
        </form>
    </div>
    
    <footer class="fixarRodape">
        
    </footer>
    </div>
</body>
</html>