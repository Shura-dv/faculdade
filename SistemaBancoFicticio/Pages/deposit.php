<!DOCTYPE html>
<html>
<head>
    <title>Depósito</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h2>Depósito</h2>
    <div class="form-container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $accountNumber = $_POST["accountNumber"];
            $amount = floatval($_POST["amount"]);

            $contasJson = file_get_contents("../Pages/account_data.json");
            $contas = json_decode($contasJson, true);

            $accountFound = false;

            foreach ($contas as &$conta) {
                if ($conta["numero"] === $accountNumber) {
                    $conta["saldo"] += $amount;
                    $accountFound = true;
                    break;
                }
            }

            if ($accountFound) {
                $contasJson = json_encode($contas, JSON_PRETTY_PRINT);
                file_put_contents("../Pages/account_data.json", $contasJson);
                echo "<p class='success-message'>Depósito de R$" . $amount . " realizado com sucesso na conta " . $accountNumber . ".</p>";
            } else {
                echo "<p class='error-message'>Conta não encontrada.</p>";
            }
        }
        ?>
        <form action="deposit.php" method="post">
            <input type="hidden" name="accountNumber" value="<?php echo isset($_GET["accountNumber"]) ? $_GET["accountNumber"] : ''; ?>">
            <label for="amount">Valor do Depósito:</label>
            <input type="number" name="amount" id="amount" step="0.01" required>
            <button type="submit">Depositar</button>
            <a href="list_accounts.php" class="list-button">Listar todas as contas</a>
        </form>

        <a href="../index.php" class="back-link">Início</a>
        
    </div>
</body>
</html>
