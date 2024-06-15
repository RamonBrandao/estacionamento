<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $placa = $_POST['placa'];
    $sql = "UPDATE clientes SET nome='$nome', placa='$placa' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <div class="editar-cliente">
        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            <label for="placa">Placa do carro</label>
            <input type="text" id="placa" name="placa" value="<?php echo $row['placa']; ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
