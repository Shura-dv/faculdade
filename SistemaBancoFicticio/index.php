<!DOCTYPE html>
<html>
<head>
    <title>Picaretas Bank - Controle de Movimentações</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Picaretas Bank <br>Controle de Movimentações</br></h1>
    <div class="container">
        <div class="input-container">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["accountNumber"])) {
                    $contasJson = file_get_contents("Pages/account_data.json");
                    $contas = json_decode($contasJson, true);
                    include("Pages/account_view.php");
                } else {
                    include("Pages/account_search.php");
                }
            ?>
        </div>
    </div>
</body>
</html>
