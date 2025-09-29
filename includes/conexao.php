<?php

    $host = "localhost";
    $user = "root";
    $password = "root";
    $db = "sa_transporte";

    $conn = mysqli_connect($host, $user, $password, $db);

    try {
        $conn = new PDO("mysql: host=$host;dbname=$db", $user, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Conexão falhou, erro: " . $e->getMessage();
    }

?>