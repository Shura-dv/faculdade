<!DOCTYPE html>
<html>
<head>
    <title>Pagamento de Faturas</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h2>Pagamento de Faturas</h2>
    <div class="input-container">
        <?php
        $contasJson = file_get_contents("account_data.json");
        $contas = json_decode($contasJson, true);

        $accountNumber = null;

        if (isset($_GET["accountNumber"])) {
            $accountNumber = $_GET["accountNumber"];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $accountNumber = $_POST["accountNumber"];
            $amount = floatval($_POST["amount"]);

            foreach ($contas as &$conta) {
                if ($conta["numero"] === $accountNumber) {
                    $saldoAtual = $conta["saldo"];

                    if ($saldoAtual >= $amount) {
                        $conta["saldo"] -= $amount;

                        $contasJson = json_encode($contas, JSON_PRETTY_PRINT);
                        file_put_contents("account_data.json", $contasJson);

                        echo "<p class='success-message'>Fatura de R$" . $amount . " paga da conta " . $accountNumber . " para " . $_POST["receiver"] . ".</p>";
                    } else {
                        echo "<p class='error-message'>Não há saldo suficiente para pagar a fatura.</p>";
                    }
                    break;
                }
            }
        }
        ?>
        <form action="invoice_payment.php" class="invoice-elements" method="post">
            <input type="hidden" name="accountNumber" value="<?php echo isset($_GET["accountNumber"]) ? $_GET["accountNumber"] : ''; ?>">
            <label for="receiver" class="input-field">Quem receberá a fatura:</label>
            <input type="text" name="receiver" id="receiver" class="input-field" required>
            <label for="amount" class="input-field">Valor do Pagamento:</label>
            <input type="number" name="amount" id="amount" class="input-field" step="0.01" required>
            <button type="submit">Pagar</button>
        </form>


        <a href="../index.php" class="back-link">Ínicio</a>
    </div>
</body>
</html>
