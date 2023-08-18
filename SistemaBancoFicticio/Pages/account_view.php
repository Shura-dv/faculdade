<head>
    <title>Informações da Conta</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<?php
$accountNumber = $_GET["accountNumber"];
$selectedAccount = null;

foreach ($contas as $conta) {
    if ($conta["numero"] === $accountNumber) {
        $selectedAccount = $conta;
        break;
    }
}

if ($selectedAccount) {
    echo "<div class='account-info'>";
    echo "<h2 class='subtitulo'>Dados da Conta</h2>";
    echo "<p class='account-number'>Número da Conta: " . $selectedAccount["numero"] . "</p>";
    echo "<p class='account-balance'>Saldo Atual: R$" . $selectedAccount["saldo"] . "</p>";
    echo "<p class='account-limit'>Limite de Cheque Especial: R$" . $selectedAccount["chequeEspecial"] . "</p>";
    echo "</div>";

    echo "<div class='account-options'>";
    echo "<h2>O que deseja fazer?</h2>";
    echo '<a href="../Pages/deposit.php?accountNumber=' . $accountNumber . '" class="option-button">Depósito</a>';
    echo '<a href="../Pages/withdraw.php?accountNumber=' . $accountNumber . '" class="option-button">Retirada/Saque</a>';
    echo '<a href="../Pages/discount_cheques.php?accountNumber=' . $accountNumber . '" class="option-button">Desconto de Cheques</a>';
    echo '<a href="../Pages/invoice_payment.php?accountNumber=' . $accountNumber . '" class="option-button">Pagamento de Faturas</a>';
    echo "</div>";

    echo "<div class='back-link'>";
    echo "<br><a href='../index.php'>Ínicio</a>";
    echo "</div>";
} else {
    echo "<p>Conta não encontrada.</p>";
}
?>
</body>
