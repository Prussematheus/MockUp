<?php
session_start();
include("../includes/painel_completo.php");
include("../includes/conexao.php");
include("../src/Auth.php");
include("../src/User.php");

$auth = new Auth();
$user = new User($conn);

if (!$auth->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

// Buscar todos os usuários
try {
    $sql_usuarios = "SELECT id_usuario, nome_funcionario, nome_usuario, email_usuario, foto_perfil 
                     FROM usuarios 
                     ORDER BY nome_funcionario";
    $stmt = $conn->prepare($sql_usuarios);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $msg = "<div class='error'>Erro ao carregar usuários: " . $e->getMessage() . "</div>";
    $usuarios = [];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
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

<body>
     <div>
        <div class="header-actions">
            <h1><i class="fas fa-users"></i> Lista de Usuários</h1>
        </div>

        <?php if (isset($msg)) echo $msg; ?>

        <div class="usuarios-container">
            <?php if (!empty($usuarios)): ?>
                <?php foreach($usuarios as $usuario): ?>
                    <div class="usuario-card">
                        <div class="fotoPerfil">
                            <img src="../uploads/<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" 
                                 alt="Foto de Perfil" 
                                 style="width: 100px; height: 100px; border-radius:50%;">
                        </div>

                        <div class="form-section">
                            <h2>Dados do Usuário</h2>
                            
                            <div class="form-group">
                                <label>Nome completo:</label>
                                <div class="info-value"><?php echo htmlspecialchars($usuario['nome_funcionario']); ?></div>
                            </div>

                            <div class="form-group">
                                <label>Nome de usuário:</label>
                                <div class="info-value"><?php echo htmlspecialchars($usuario['nome_usuario']); ?></div>
                            </div>

                            <div class="form-group">
                                <label>Endereço de e-mail:</label>
                                <div class="info-value"><?php echo htmlspecialchars($usuario['email_usuario']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-users">
                    <i class="fas fa-users fa-3x"></i>
                    <p>Nenhum usuário encontrado.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <a style="text-decoration: none;" href="bem_vindo.php"> 
        <button class="logout">
            <i class="fas fa-arrow-left" style="color:rgb(255, 255, 255);"></i>
            <p style="color: white;">Voltar</p>
        </button>
    </a> 

    <footer class="fixarRodape2">
    </footer>
        

</body>
</html>