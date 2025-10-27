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

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $user = new User($conn);
    $administrador = isset($_POST['administrador']) ? 1 : 0;
    
    $dadosEndereco = [];
    if (!empty($_POST['cep'])) {
        try {
            $dadosEndereco = $user->validarCEP($_POST['cep']);
            $msg .= "CEP validado com sucesso! ";
            
        } catch (Exception $e) {
            $msg = "Erro no CEP: " . $e->getMessage();
        }
    }
    $result = $user->register(
        $_POST['nome_funcionario'],
        $_POST['nome_usuario'],
        $_POST['email_usuario'],
        $_POST['senha'],
        $_POST['telefone_usuario'],
        $_POST['cpf_usuario'],
        $administrador,
        $_POST['cep'] ?? '',
        $dadosEndereco['logradouro'] ?? '',
        $dadosEndereco['bairro'] ?? '',
        $dadosEndereco['cidade'] ?? '',
        $dadosEndereco['uf'] ?? ''
    );
    
    if ($result) {
        $msg .= "Usuário cadastrado com sucesso!";
    } else {
        $msg = "Erro ao cadastrar usuário!";
    }
}

// Exibe a mensagem para o usuário
if (!empty($msg)) {
    echo "<div class='alert'>$msg</div>";
}
?>

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
                    <label for="email_usuario"></label>
                    <input type="email" name="email_usuario" placeholder="E-mail" required>
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
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" maxlength="9" 
                        onblur="consultarCEP()" placeholder="00000-000">
                    <small class="cep-status"></small>
                </div>
                <div class="form-group">
                    <label for="logradouro"></label>
                    <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" required>
                </div>

                <div class="form-group">
                    <label for="bairro"></label>
                    <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                </div>

                <div class="form-group">
                    <label for="cidade"></label>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" required readonly>
                </div>

                <div class="form-group">
                    <label for="uf"></label>
                    <input type="text" id="uf" name="uf" placeholder="UF" required readonly>
                </div>
                <div class="form-group">
                    <label for="administrador">Admnistrador</label>
                    <input type="checkbox" id="administrador" name="administrador" value="1">
                </div>    
            </div>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </div>


</body>
</html>