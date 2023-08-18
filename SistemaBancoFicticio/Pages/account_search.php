<head>
    <title>Busca</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<h2 class="buscar-conta">Buscar Conta</h2>
<form action="index.php" method="get">
    <label for="accountNumber">Número da Conta:</label>
    <select name="accountNumber" id="accountNumber" required>
        <option value="" selected disabled>Selecione uma conta...</option>
        <?php
            $contasJson = file_get_contents("Pages/account_data.json");
            $contas = json_decode($contasJson, true);
             
            foreach ($contas as $conta): ?>
            <option value="<?php echo $conta['numero']; ?>"><?php echo $conta['numero']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Buscar</button>
</form>

