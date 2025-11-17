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
        }
        if (!$auth->isLoggedIn()) {
            header("Location: index.php");
            exit;
        }
        
        $currentUser = $user->getUserById($_SESSION['user_id']);

        $msg = "";

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_relatorio = trim($_POST['nome_relatorio']);
            $conteudo_relatorio = trim($_POST['conteudo_relatorio']);
            $autor_relatorio = $_SESSION['user_id'];
            $tipo_relatorio = $_POST['tipo_relatorio'];
    
        if (empty($nome_relatorio) || empty($conteudo_relatorio)) {
            $msg = "<div class='error'>Preencha todos os campos!</div>";
        } else {
        try {
            $sql = "INSERT INTO relatorios (nome_relatorio, conteudo_relatorio, tipo_relatorio, autor_relatorio) 
            VALUES (:nome_relatorio, :conteudo_relatorio, :tipo_relatorio, :autor_relatorio)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_relatorio', $nome_relatorio);
            $stmt->bindParam(':conteudo_relatorio', $conteudo_relatorio);
            $stmt->bindParam(':autor_relatorio', $autor_relatorio);
            $stmt->bindParam(':tipo_relatorio', $tipo_relatorio);
            
            if ($stmt->execute()) {
                $msg = "<div class='success'>Relatório enviado com sucesso!</div>";
                $nome_relatorio = $conteudo_relatorio = "";
            }
        } catch (PDOException $e) {
            $msg = "<div class='error'>Erro ao enviar relatório: " . $e->getMessage() . "</div>";
        }
    }
}

    ?>

   <!DOCTYPE php>
<php lang="en">



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

    <div class="container">
        <h1>Enviar novo relatório</h1>
    </div>

    <?php echo $msg; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome_relatorio">Título do Relatório:</label>
                <input type="text" id="nome_relatorio" name="nome_relatorio" 
                       value="<?php echo isset($nome_relatorio) ? htmlspecialchars($nome_relatorio) : ''; ?>" 
                       placeholder="Digite o título do relatório" required>
            </div>
            
            <div class="form-group">
                <label for="conteudo_relatorio">Conteúdo do Relatório:</label>
                <textarea id="conteudo_relatorio" name="conteudo_relatorio" 
                          placeholder="Descreva detalhadamente o relatório..." required><?php echo isset($conteudo_relatorio) ? htmlspecialchars($conteudo_relatorio) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tipo_relatorio">Tipo de Relatório:</label>
                <select id="tipo_relatorio" name="tipo_relatorio" required>
                <option value="problema_ferrorama">Problema no Ferrorama</option>
                <option value="bug_sistema">Bug do Sistema</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="button" onclick="window.location.href='visualizar_relatorios.php'" class="btn btn-voltar">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
                <button type="submit" class="btn">
                    <i class="fas fa-paper-plane"></i> Enviar Relatório
                </button>
            </div>
            
        </form>
    </div>

    <footer class="fixarRodape">

    </footer>
        
    </body>
    </html>