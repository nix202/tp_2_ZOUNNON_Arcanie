<?php
include_once ("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Verification</title>
</head>
<body>
<form action="Sauvegarde.php" method="POST">
    <fieldset>
    <?php
    foreach($_POST as $id => $address) {
        echo addressFields($id, $address, true);
        echo "<br>";
    }
    ?>
    </fieldset>
        <a href="#" class="btn btn-primary" onclick="history.back()"> Precedent </a>
        <button class="btn btn-primary" type="submit" > Confirmer  </button>
</form>
</body>
</html>
