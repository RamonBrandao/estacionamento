<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM clientes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Resetar os IDs
        $resetSql = "ALTER TABLE clientes AUTO_INCREMENT = 1";
        $conn->query($resetSql);

        // Corrigir IDs
        $fixIdsSql = "SET @count = 0; 
                      UPDATE clientes SET id = @count:= @count + 1; 
                      ALTER TABLE clientes AUTO_INCREMENT = 1";
        $conn->multi_query($fixIdsSql);

        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: index.php");
}
?>

