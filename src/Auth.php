<?php

class Auth{
    public function isLoggedIn(){
        return isset($_SESSION['user_id']);
    }

    public function loginUser($user){
        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['username'] = $user['nome_usuario'];
    }

    public function logout(){
        session_destroy();
        header("Location: index.php");
    }
}


?>