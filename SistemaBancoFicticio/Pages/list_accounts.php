<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contas</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h2>Lista de Contas</h2>
    <div class="input-container">
        <?php
        $contasJson = file_get_contents("account_data.json");
        $contas = json_decode($contasJson, true);

        echo "<table class='table-style'>";
        echo "<tr><th>Número da Conta</th><th>Saldo Atual</th><th>Limite de Cheque Especial</th></tr>";
        foreach ($contas as $conta) {
            echo "<tr>";
            echo "<td>" . $conta["numero"] . "</td>";
            echo "<td>R$" . $conta["saldo"] . "</td>";
            echo "<td>R$" . $conta["chequeEspecial"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <a href="../index.php" class="back-link">Ínicio</a>
    </div>    
</body>
</html>
