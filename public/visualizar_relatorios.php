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

        try {
    $sql_relatorios = "SELECT r.*, u.nome_funcionario 
                       FROM relatorios r 
                       INNER JOIN usuarios u ON r.autor_relatorio = u.id_usuario 
                       ORDER BY r.data_relatorio DESC";
    
    $stmt = $conn->prepare($sql_relatorios);
    $stmt->execute();
    $relatorios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $msg = "Erro ao carregar relatórios: " . $e->getMessage();
    $relatorios = [];
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }
        
        .dashboard {
            padding: 20px;
        }
     
        .relatorios-container {
            max-width: 1200px;
            margin: 10px;
            border: #004AAD 2px solid;
        }

        .relatorio-container{
            border-bottom:rgb(52, 58, 66) 2px solid;
        }
        
        .relatorio-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #3498db;
        }
        
        .relatorio-header {
            background-color: #f4f4f4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            border-bottom: #004AAD 2px solid;
        }
        
        .relatorio-header h3 {
            margin: 5px;
            border: 5px;
            color:rgb(0, 0, 0);
            flex: 1;
        }
        
        .relatorio-date {
            color: #7f8c8d;
            font-size: 0.9em;
            margin-right: 15px;
        }

        .conteudo-relatorio{
            margin-left: 15px;
        }
        
        .relatorio-content {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #333;
        }
        
        .relatorio-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
            color: #7f8c8d;
            margin-left: 15px;
        }
        
        .no-relatorios {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            background: white;
            border-radius: 8px;
        }

        .relatorio-author{
            margin-bottom: 10px;
            text-align: center;
        }
        
        button {
            background: none;
            border: none;
            cursor: pointer;
        }
        
        a {
            text-decoration: none;
        }

        .delete{
            background-color: red;
            color: white;
            width: 50%;
            border-radius: 5%;
            height: 30px;
        }

        .relatorio-tipo{
            margin-right: 5px
        }
    </style>
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

    <div class="dashboard">
        <h1>Visualizar Relatórios</h1>
    </div>

            <div class="relatorios-container">
            <?php if (!empty($relatorios)): ?>
    <?php foreach($relatorios as $relatorio): ?>
        <div class="relatorio-container">
            <div class="relatorio-header">
                <h3 style="color: black;"><?php echo htmlspecialchars($relatorio['nome_relatorio']); ?></h3>
                <div style="display: flex; flex-direction: column; align-items: flex-end;">
                    <span class="relatorio-tipo">
                        <?php 
                        if ($relatorio['tipo_relatorio'] == 'bug_sistema') {
                            echo "<p class 'bug-sistema'>Bug do Sistema</p>";
                        } else {
                            echo "<p class 'problema-ferrorama'>Problema no Ferrorama</p>";
                        }
                        ?>
                    </span>
                    <span class="relatorio-date">
                        <?php echo date('d/m/Y H:i', strtotime($relatorio['data_relatorio'])); ?>
                    </span>
                </div>
            </div>
            
            <div class="relatorio-content">
                <p class="conteudo-relatorio"><?php echo nl2br(htmlspecialchars($relatorio['conteudo_relatorio'])); ?></p>
            </div>
            
            <div class="relatorio-footer">
                <span class="relatorio-author">
                    <i class="fas fa-user"></i>
                    Autor: <?php echo htmlspecialchars($relatorio['nome_funcionario']); ?>
                    <?php echo "<button class='delete' onclick=\"if(confirm('Tem certeza?')) window.location.href='deletar_relatorio.php?id=" . $relatorio['id_relatorio'] . "'\">Excluir</button>"; ?>
                </span>
            </div>
        </div>
    <?php endforeach; ?>
            <?php else: ?>
                <div class="no-relatorios">
                    <i class="fas fa-file-alt fa-3x"></i>
                    <p>Nenhum relatório encontrado.</p>
                    <?php if (isset($msg)) echo "<p>Erro: $msg</p>"; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <button type="button" onclick="window.location.href='enviar_relatorio.php'" class="btn">
            <i class="fas fa-plus"></i> Enviar novo relatório
        </button>
    </div>

</body>

</html>