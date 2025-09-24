<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Geral</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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


    ?>


    <header>


        <div id="header">
            <button class="menu">
                <i class="fas fa-bars fa-2x" style="color: white;"></i>
            </button>
            <h3 class="titulo" style="color: white;">Sistema Ferroviário </h3>
            <button class="notificacao">
                <i class="fas fa-bell fa-2x" style="color: white;"></i>
            </button>
            <button class="perfil" onclick="redirecionar_usuario()">
                <i class="fas fa-user-circle fa-3x" style="color: white;"></i>
            </button>
        </div>


    </header>

    
    <div class="espacamento"></div>

    <div class="dashboard">
        <h1>Dashboard Geral</h1>
    </div>

    <div class="dashboard-container"> <!--Container para centralização-->
        <div class="dashboard-fundo"> <!--Divs para estilização com cores de fundo e posicionamento-->
            <div class="dashboard-rota">
                <p class="rota">Joinville: Sul - Zona Industrial</p> 
            </div>
            <div class="dashboard-horario-um">
                <p>12:30</p>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <div class="dashboard-rota">
                <p class="rota">Joinville: Norte - Sul</p>
            </div>
            <div class="dashboard-horario-dois">
                <p>13:00</p>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-fundo">
            <div class="dashboard-rota">
                <p class="rota">Joinville: Norte - Zona Leste</p>
            </div>
            <div class="dashboard-horario-tres">
                <p>14:00</p>
            </div>
        </div>
    </div>
<?php
        $sql_usuarios = "SELECT nome_funcionario, nome_usuario, email_usuario, telefone_usuario FROM usuarios";

        echo "<h1 class='h1'> Lista de Usuários </h1>";

        $stmt = mysqli_prepare($conn, $sql_usuarios);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($dado = mysqli_fetch_assoc($result)) {
        echo "<ul class='list-group mb-3'>";
        echo "<li class='list-group-item'> Nome Funcionário: " . $dado['nome_funcionario'] . "</li>";
        echo "<li class='list-group-item'> Nome Usuário: " . $dado['nome_usuario'] . "</li>";
        echo "<li class='list-group-item'> Email: " . $dado['email_usuario']. "</li>";
        echo "<li class='list-group-item'> Telefone: " . $dado['telefone_usuario']. "</li>";
        echo "</ul>";
}
?>

    

    <footer class="fixarRodape">

    </footer>

</body>

</html>