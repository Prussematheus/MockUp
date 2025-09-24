<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../javascript/script.js"></script>
</head>
<body>

<?php

    include("conexao.php");

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

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_funcionario = $_POST["nome_funcionario"];
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["enderecoEmail"];
    $senha_usuario = $_POST["senha"];
    $telefone_usuario = $_POST["telefone_usuario"];
    $cpf_usuario = $_POST["cpf_usuario"];
    

    $sql = "INSERT INTO usuarios(nome_funcionario, nome_usuario, email_usuario, senha_usuario, telefone_usuario, cpf_usuario) VALUES(?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $nome_funcionario, $nome_usuario, $email_usuario, $senha_usuario, $telefone_usuario, $cpf_usuario);
        
        if(mysqli_stmt_execute($stmt)) {
            echo "Funcionário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);  
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da query: " . mysqli_error($conn);
    }
}
?>

    <header>


        <div id="header">
            <button class="menu"> <!--Botão de menu-->
                <i class="fas fa-bars fa-2x" style="color: white;"></i>
            </button>
            <h3 class="titulo">Sistema Ferroviário</h3>
            <button class="notificacao">
                <i class="fas fa-bell fa-2x" style="color: white;"></i>
            </button>
            <a class="perfil" href="../public/tela_usuario.php"> <!--Redireciona o usuário para a tela de personalização de informações-->
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
</a>
        </div>


    </header>

    <div class="espacamento"></div>
    
        <div id="bemVindo">
        <h1>Cadastrar novo funcionário</h1>
        <i class="fas fa-train fa-5x"></i>
    </div>
    <p class="inserir">Por favor insira as informações para o cadastro</p>

    <div class='container'>
        <form method="POST" id="formLogin">
            <div class="form-section">
                <div class="form-group">
                    <label for="nome_funcionario"></label>
                    <input type="text" name="nome_funcionario" placeholder="Nome do funcionário" required>
                </div> 
                <div class="form-group">
                    <label for="nome_usuario"></label>
                    <input type="text" name="nome_usuario" placeholder="Nome de usuário" required>
                </div> 
                <div class="form-group">
                    <label for="enderecoEmail"></label>
                    <input type="email" name="enderecoEmail" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>      
                <div class="form-group">
                    <label for="telefone_usuario"></label>
                    <input type="text" name="telefone_usuario" placeholder="Telefone" required>
                </div>  
                <div class="form-group">
                    <label for="cpf_usuario"></label>
                    <input type="text" name="cpf_usuario" placeholder="CPF" required>
                </div>    
            </div>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </div>


</body>
</html>