<?php
session_start();
include("../includes/painel_completo.php");
include("../includes/conexao.php");
include("../src/Auth.php");
include("../src/User.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User($conn);
$currentUser = $user->getUserById($_SESSION['user_id']);
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["foto_perfil"])) {
    $target_dir = "../uploads/";
    
    // Gerar nome único para evitar sobrescrever arquivos
    $file_extension = strtolower(pathinfo($_FILES["foto_perfil"]["name"], PATHINFO_EXTENSION));
    $new_filename = "profile_" . $_SESSION['user_id'] . "_" . time() . "." . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    $uploadOk = 1;
    $imageFileType = $file_extension;

    // Verificar se é uma imagem real
    $check = getimagesize($_FILES["foto_perfil"]["tmp_name"]);
    if ($check === false) {
        $msg = "<div class='error'>O arquivo não é uma imagem.</div>";
        $uploadOk = 0;
    }

    // Verificar tamanho do arquivo (5MB)
    if ($_FILES["foto_perfil"]["size"] > 5000000) {
        $msg = "<div class='error'>Imagem muito pesada (máximo 5MB).</div>";
        $uploadOk = 0;
    }

    // Permitir apenas certos formatos
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $msg = "<div class='error'>Apenas JPG, JPEG, PNG e GIF são permitidos.</div>";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file)) {
            // Atualizar no banco com o novo nome do arquivo
            if ($user->updateProfilePic($_SESSION['user_id'], $new_filename)) {
                $_SESSION['msg'] = "<div class='success'>Foto de perfil atualizada com sucesso!</div>";
                header("Location: tela_usuario.php");
                exit();
            } else {
                $msg = "<div class='error'>Erro ao atualizar no banco de dados.</div>";
            }
        } else {
            $msg = "<div class='error'>Erro ao fazer upload do arquivo.</div>";
        }
    }
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

    <div>
        <h2 class="tituloLogin"><i class="fas fa-camera"></i> Alterar Foto de Perfil</h2>
        
        <?php echo $msg; ?>
        
        <div class="fotoPerfil">
            <img src="../uploads/<?php echo htmlspecialchars($currentUser['foto_perfil']); ?>" 
                 style="width: 150px; height: 150px; border-radius:50%;"  
                 alt="Foto Atual" 
                 onerror="this.src='../uploads/default.jpg'">
            <p>Foto atual</p>
        </div>
        
        <div class="form-section">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label><strong>Selecionar nova foto:</strong></label>
                    <input type="file" name="foto_perfil" accept="image/*" required style="width: 95%; padding: 10px; display:block">
                    <small style="color: #666; display: block; margin-top: 5px;">Formatos: JPG, PNG, GIF (Máx: 5MB)</small>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn" style="width: 200px; margin: 10px;">
                        <i class="fas fa-upload"></i> Upload da Foto
                    </button>
                </div>
            </form>
            
            <div class="form-actions">
                <a href="tela_usuario.php" style="text-decoration: none;">
                    <button type="button" class="logout" style="margin: 10px;">
                        <i class="fas fa-arrow-left" style="color: white;"></i>
                        <span style="color: white;">Voltar</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <footer class="fixarRodape">
    </footer>
</body>
</html>