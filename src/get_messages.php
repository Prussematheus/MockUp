<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

require("phpMQTT.php");
require __DIR__ . '/../includes/env_loader.php';

loadEnv(__DIR__ . '/../includes/.env');

$server = $_ENV['MQTT_SERVER'];
$port   = (int) $_ENV['MQTT_PORT'];
$topic  = "IoT/trem/velocidade";
$client_id = "phpmqtt-" . rand();
$username = $_ENV['MQTT_USERNAME'];
$password = $_ENV['MQTT_PASSWORD'];

header('Content-Type: application/json');

$messages = [];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo json_encode(["error" => "Falha na conexão"]);
    exit;
}

$mqtt->subscribe([$topic => ["qos" => 0, "function" => function ($topic, $msg) use (&$messages) {
    $messages[] = [
        "topic" => $topic,
        "msg"   => $msg,
        "time"  => date("H:i:s"),
        "date"  => date("Y-m-d")
    ];
}]], 0);

// ouvir por 2 segundos
$start = time();
while (time() - $start < 2) {
    $mqtt->proc();
}

$mqtt->close();

$_SESSION['resposta_vel'] = $messages;

header("location: ../public/dashboard.php");
