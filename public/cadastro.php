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

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_funcionario = $_POST["nome_funcionario"];
    $nome_usuario = $_POST["nome_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $senha_usuario = $_POST["senha_usuario"];
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

<div class="notificacao-painel"> <!--Div do painel de notificações (inicialmente oculto)-->
        <div class="notificacao-cabecalho">
            <h4>Notificações</h4>
            <button class="fechar-notificacao">&times;</button> <!--Botão para fechar o painel de notificações.-->
        </div>
        <div class="notificacao-lista">
            <div class="notificacao-item"> <!--Define os itens (notificações) do painel-->
                <i class="fas fa-train"></i>
                <div>
                    <p>Trem #1245 atrasado em 15 minutos</p>
                    <small>Há 2 horas</small>
                </div>
            </div>
            <div class="notificacao-item">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <p>Manutenção programada para a linha 3</p>
                    <small>Ontem, 14:30</small>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-painel"> <!--Painel do menu (inicalmente oculto)-->
        <div class="menu-cabecalho">
            <button class="fechar-menu">&times;</button> <!--Botão para fechar o menu-->
        </div>
        <div class="menu-lista"> <!--Define cada item que terá no menu-->
            <a href="../public/bem_vindo.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-house" style="color: #004aad;"></i>
                    <div>
                        <p>Início</p>
                    </div>
                </div>
            </a>
            <a href="../public/dashboard.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-chart-line" style="color: #004aad;"></i>
                    <div>
                        <p>Dashboard Geral</p>
                    </div>
                </div>
            </a>
            <a href="../public/gestao_rotas.php" class="menu-item-link">
                <div class="menu-item">
                    <i class="fas fa-map-marker-alt" style="color: #004aad;"></i>
                    <div>
                        <p>Gestão de Rotas</p>
                    </div>
                </div>
            </a>
            <a href="../public/reportar_problema.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-star fa" style="color: #004aad;"></i>
                    <div>
                        <p>Reportar Problema</p>
                    </div>
                </div>
            </a>
            <a href="../public/visualizar_relatorios.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-file" style="color: #004aad;"></i>
                    <div>
                        <p>Relatórios e análises</p>
                    </div>
                </div>
            </a>

            <a href="?logout=1" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-sign-out-alt" style="color: #004aad;"></i>
                    <div>
                        <p>Sair</p>
                    </div>
                </div>
            </a>
        </div>
    </div>


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