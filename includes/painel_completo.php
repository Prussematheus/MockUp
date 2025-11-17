<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painéis</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!--Utilização do Fontawesome para ícones no trabalho-->
    <script src="../javascript/script.js"></script>
</head>

<body>
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
            <a href="../public/visualizar_relatorios.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-file" style="color: #004aad;"></i>
                    <div>
                        <p>Relatórios e análises</p>
                    </div>
                </div>
            </a>

            <a href="../public/cadastro.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-user-plus" style="color: #004aad;"></i>
                    <div>
                        <p>Cadastrar novo funcionário</p>
                    </div>
                </div>
            </a>

            <a href="../public/cadastro.php" class="menu-item-link"> 
                <div class="menu-item">
                    <i class="fas fa-list" style="color: #004aad;"></i>
                    <div>
                        <p>Lista de usuários</p>
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
</body>
</html>