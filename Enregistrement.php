<?php
include_once ("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Enregistrement</title>
</head>
<body>
<style>
body{
    background-color: #ccc;
}
</style>
    <form action="Verification.php" method="POST">
        <fieldset>
            <legend>Enregistrement d'adresses </legend>
        <?php 
        echo enregistrement($_POST["adresseNum"]);
        echo "<br>";
        ?>
        </fieldset>
        <a href="#" class="btn btn-primary" onclick="history.back()"> Precedent </a>
        <button class="btn btn-primary" type="submit" > Confirmer  </button>

    </form>
    
</body>
</html>