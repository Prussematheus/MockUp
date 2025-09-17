<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php

    include("conexao.php");

    session_start();

    if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
    }

    $msg = "";


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["enderecoEmail"] ?? "";
        $pass = $_POST["senha"] ?? "";

        $sql = "SELECT id_usuario, email_usuario, senha_usuario FROM usuarios WHERE email_usuario=? AND senha_usuario=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $dados = mysqli_fetch_assoc($result);
        $stmt -> close();

        if($dados) {
            $_SESSION["user_id"] = $dados["id_usuario"];
            header("Location: bem_vindo.php");
            
            exit;
        } else {
            $msg = "Usuário ou senha incorretos";
        }
    }

?>

<header>

    <div id="header">
        <h3 class="tituloLogin">Sistema Ferroviário</h3>
</header>

<main>

    <?php if (!empty($_SESSION["user_id"])): 
        header("Location: bem_vindo.php"); 
    ?>

    <div class="espacamento"></div>

    <?php else: ?>
    <div id="bemVindo">
        <h1>Bem Vindo de Volta!</h1>
        <i class="fas fa-train fa-5x"></i>
    </div>
     <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <p class="inserir">Por favor insira suas informações para Login</p>

    <div class='container'>
        <form method="POST" id="formLogin">
            <div class="form-section">
                <div class="form-group">
                    <label for="enderecoEmail"></label>
                    <input type="email" id="enderecoEmail" name="enderecoEmail" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>          
            </div>
            <button type="submit" class="btn">LOGIN</button>
        </form>
    </div>

    <?php endif; ?>

    <footer class="fixarRodape">
        
    </footer>
</main>    
</body>
</html>