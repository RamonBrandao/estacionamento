<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $placa = $_POST['placa'];
    $data = date('Y-m-d'); // Formato de data no MySQL: AAAA-MM-DD
    $hora = date('H:i:s'); // Formato de hora no MySQL: HH:MM:SS

    $sql = "INSERT INTO clientes (nome, placa, data, hora) VALUES ('$nome', '$placa', '$data', '$hora')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

