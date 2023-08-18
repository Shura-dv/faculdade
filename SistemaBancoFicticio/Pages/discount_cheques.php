<!DOCTYPE html>
<html>
<head>
    <title>Desconto de Cheques</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h2>Desconto de Cheques</h2>
    <div class="form-container">
        <?php
                
        $contasJson = file_get_contents("account_data.json");
        $contas = json_decode($contasJson, true);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $accountNumber = $_POST["accountNumber"];
            $chequeValue = floatval($_POST["chequeValue"]);
        
            $contasJson = file_get_contents("account_data.json");
            $contas = json_decode($contasJson, true);
        
            foreach ($contas as &$conta) {
                if ($conta["numero"] === $accountNumber) {
                    $chequeEspecial = $conta["chequeEspecial"];
        
                    if ($chequeEspecial >= $chequeValue) {
                        $conta["chequeEspecial"] -= $chequeValue;
        
                        $contasJson = json_encode($contas, JSON_PRETTY_PRINT);
                        file_put_contents("account_data.json", $contasJson);
        
                        echo "<p class='success-message'>Valor de R$" . $chequeValue . " descontado do cheque especial da conta " . $accountNumber . ".</p>";
                    } else {
                        echo "<p class='error-message'>Não há fundos suficientes no cheque especial para realizar o desconto.</p>";
                    }
                    break;
                }
            }
        }
        ?>
        <form action="discount_cheques.php" method="post">
            <input type="hidden" name="accountNumber" value="<?php echo isset($_GET["accountNumber"]) ? $_GET["accountNumber"] : ''; ?>">
            <label for="chequeValue">Valor do Cheque:</label>
            <input type="number" name="chequeValue" id="chequeValue" step="0.01" required>
            <button type="submit">Descontar Cheque</button>
        </form>


        <a href="../index.php" class="back-link">Ínicio</a>
    </div>
</body>
</html>
