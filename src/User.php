<?php

class User {
    private $conn;

    public function __construct($db){
        $this-> conn = $db;
    }

   public function register($nome_funcionario, $nome_usuario, $email, $password, $telefone, $cpf, $administrador = 0){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome_funcionario, nome_usuario, email_usuario, senha_usuario, telefone_usuario, cpf_usuario, administrador) 
            VALUES (:nome_funcionario, :nome_usuario, :email, :senha, :telefone, :cpf, :administrador)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nome_funcionario', $nome_funcionario);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $hash);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':administrador', $administrador, PDO::PARAM_INT);
    return $stmt->execute();
}

    public function login($email,$password){
        $sql = "SELECT * FROM usuarios WHERE email_usuario = :email";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':email', $email);
        $stmt ->execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['senha_usuario'])){
            return $user;
        }
        return false;
    }

    public function getUserById($userId){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':id', $userId);
        $stmt ->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfilePic($userId,$profilePic){
        $sql = "UPDATE usuarios SET foto_perfil = :profile_pic WHERE id = :id";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':profile_pic', $profilePic);
        $stmt ->bindParam(':id', $userId);
        return $stmt -> execute();
    }


}

?>