<?php
session_start();
include("../includes/conexao.php");
include("../src/Auth.php");

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_relatorio = $_GET['id'];
    
    try {
        $sql_delete = "DELETE FROM relatorios WHERE id_relatorio = :id";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bindParam(':id', $id_relatorio);
        
        if ($stmt_delete->execute()) {
            $_SESSION['msg'] = "<div class='success'><i class='fas fa-check-circle'></i> Relatório deletado com sucesso!</div>";
        } else {
            $_SESSION['msg'] = "<div class='error'><i class='fas fa-exclamation-circle'></i> Erro ao deletar relatório.</div>";
        }
        
    } catch (PDOException $e) {
        $_SESSION['msg'] = "<div class='error'><i class='fas fa-exclamation-circle'></i> Erro: " . $e->getMessage() . "</div>";
    }
    
    header("Location: visualizar_relatorios.php");
    exit();
}
?>