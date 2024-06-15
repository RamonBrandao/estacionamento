<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./carro.png" type="image/png">
    <title>VITA PARK</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>VITA PARK - ESTACIONAMENTO</h1>
    <div class="cadastro-cliente">
        <h3>CADASTRO DE CLIENTES</h3>
        <form action="adicionar.php" method="POST">
            <label for="nome">Nome do Cliente:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="placa">Placa do Veículo:</label>
            <input type="text" id="placa" name="placa" required>
            <button type="submit">Adicionar</button>
        </form>
    </div>
    <div class="controle-estacionamento">
        <h3>CONTROLE DE ENTRADA - VEÍCULOS</h3>
        <table>
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>PLACA</th>
                    <th>DATA</th>
                    <th>HORA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM clientes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $data_formatada = date("d/m/Y", strtotime($row["data"]));
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["placa"] . "</td>";
                        echo "<td>" . $data_formatada . "</td>";
                        echo "<td>" . $row["hora"] . "</td>";
                        echo "<td>
                                <a class='btn btn-editar' href='editar.php?id=" . $row["id"] . "'>Editar</a>
                                <a class='btn btn-excluir' href='excluir.php?id=" . $row["id"] . "'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
