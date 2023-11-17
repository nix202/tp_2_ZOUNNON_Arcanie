<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="Enregistrement.php?num=2">
        <label for ="NombreAdresse" >NombreAdresse </label>
        <input type="number" id="adresse" name="adresse" min="1" required="">
        <button type="submit" > confirmer  </button>
    </form>
<?php 
session_start();
$_SESSION['num'] = 3;
?>







</body>
</html>
