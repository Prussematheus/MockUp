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

    <img src="../uploads/<?php echo htmlspecialchars($currentUser['foto_perfil']); ?>" alt="Foto de Perfil" style="width: 150px; height: 150px; border-radius:50%;">

    <a href=upload_foto.php class="btn-editar-perfil">Editar Foto de Perfil</a>

    <div class="form-section">
        <h2>Dados da Conta</h2>
        
        <div class="form-group">
            <label>Nome completo:</label>
            <div class="info-value"><?php echo htmlspecialchars($currentUser['nome_funcionario'] ?? 'Não informado'); ?></div>
        </div>

        <div class="form-group">
            <label>Nome de usuário:</label>
            <div class="info-value"><?php echo htmlspecialchars($currentUser['nome_usuario'] ?? 'Não informado'); ?></div>
        </div>

        <div class="form-group">
            <label>Endereço de e-mail:</label>
            <div class="info-value"><?php echo htmlspecialchars($currentUser['email_usuario'] ?? 'Não informado'); ?></div>
        </div>

    </div>

    <footer class="fixarRodape"></footer>
</body>
</html>