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

$currentUser = $user->getUserById($_SESSION['user_id']);
$msg = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_funcionario = trim($_POST['nome_funcionario']);
    $nome_usuario = trim($_POST['nome_usuario']);
    $email_usuario = trim($_POST['email_usuario']);
    $telefone_usuario = trim($_POST['telefone_usuario']);
    
    if (empty($nome_funcionario) || empty($nome_usuario) || empty($email_usuario)) {
        $msg = "<div class='error'>Preencha todos os campos obrigatórios!</div>";
    } else {
        try {
            $sql = "UPDATE usuarios SET 
                    nome_funcionario = :nome_funcionario,
                    nome_usuario = :nome_usuario,
                    email_usuario = :email_usuario,
                    telefone_usuario = :telefone_usuario
                    WHERE id_usuario = :id_usuario";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_funcionario', $nome_funcionario);
            $stmt->bindParam(':nome_usuario', $nome_usuario);
            $stmt->bindParam(':email_usuario', $email_usuario);
            $stmt->bindParam(':telefone_usuario', $telefone_usuario);
            $stmt->bindParam(':id_usuario', $_SESSION['user_id']);
            
            if ($stmt->execute()) {
                $msg = "<div class='success'><i class='fas fa-check-circle'></i> Perfil atualizado com sucesso!</div>";
                $currentUser = $user->getUserById($_SESSION['user_id']);
            }
        } catch (PDOException $e) {
            $msg = "<div class='error'><i class='fas fa-exclamation-circle'></i> Erro ao atualizar: " . $e->getMessage() . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

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
        <div class="fotoPerfil" style="margin-top: 20px;">
            <img src="../uploads/<?php echo htmlspecialchars($currentUser['foto_perfil']); ?>" alt="Foto de Perfil" style="width: 150px; height: 150px; border-radius:50%;">
            <br>
            <a href="upload_foto.php" class="btn-editar-perfil">
                <i class="fas fa-camera"></i> Alterar Foto
            </a>
        </div>

        <?php echo $msg; ?>

        <div class="form-section">
            <h2><i class="fas fa-user-edit"></i> Editar Dados do Perfil</h2>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nome_funcionario">Nome completo:</label>
                    <input type="text" id="nome_funcionario" name="nome_funcionario" 
                           value="<?php echo htmlspecialchars($currentUser['nome_funcionario']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome_usuario">Nome de usuário:</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" 
                           value="<?php echo htmlspecialchars($currentUser['nome_usuario']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email_usuario">Endereço de e-mail:</label>
                    <input type="email" id="email_usuario" name="email_usuario" 
                           value="<?php echo htmlspecialchars($currentUser['email_usuario']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefone_usuario">Telefone:</label>
                    <input type="tel" id="telefone_usuario" name="telefone_usuario" 
                           value="<?php echo htmlspecialchars($currentUser['telefone_usuario']); ?>">
                </div>

                <div class="form-actions">
                    <a style="text-decoration: none;" href="tela_usuario.php">
                        <button class="logout" style="margin-bottom: 0px; margin-top:60px; margin-right: 10px; width: 195px">
                            <i class="fas fa-arrow-left" style="color:rgb(255, 255, 255);"></i>
                            <p style="color: white;">Voltar</p>
                        </button>
                    </a> 
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>