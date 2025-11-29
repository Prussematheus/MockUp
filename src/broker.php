<?php

class Broker
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Salva no Histórico
    public function saveHist($topic, $msg, $time)
    {
        $sql = "INSERT INTO historico_sensores (topic, msg, time) VALUES (:topic, :msg, :time)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':topic', $topic);
        $stmt->bindParam(':msg', $msg);
        $stmt->bindParam(':time', $time);
        return $stmt->execute();
    }

    // Mostra o Valor do banco de dados
    // Busca pelo último dado do sensor
    public function dataVel()
{
    $sql = "SELECT * FROM historico_sensores ORDER BY id DESC LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return [
        'msg_anterior' => $row['msg'],
        'time_anterior' => $row['time'],
        'date_anterior' => $row['date']
    ];
}

}
?>