<?php

    $host = "localhost";
    $user = "root";
    $password = "root";
    $db = "sa_transporte";

    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        echo "Falha na conexão";
    }

?>