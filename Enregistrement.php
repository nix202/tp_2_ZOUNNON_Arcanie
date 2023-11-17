<?php
include_once ("functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="../Accueil" method="POST">
        <fieldset>
            <legend>Enregistrement d'adresses </legend>
        <?php 
        echo enregistrement($_SESSION["num"]);
        echo "<br>";
        // echo addressFields("1", "abc", 1, "h1h1h1", "ottawa", "facturaction");
        ?>

        <label for ="Street" >street </label>
            <input type="text" id="street" name="street" max="50" min="5" required><br><br><br>

        <label for ="street_nb" >street_nb </label>
            <input type="number" id="street_nd" name="street_nb" min="5" required=""><br><br><br>

        <label for ="type" >type </label>
            <select id="type"name="type" required>
                <option value="Delivery">Delivery</option>
                <option value="Facturation">Facturation</option>
                <option value="Order_track">Order_track</option>
            </select><br><br><br>
            

        <label for ="City" >City: </label>
           
            <select id="City" name="City" required>
                <optgroup label="VILLE"></optgroup>
                    <option value="Montreal">Montreal</option>
                    <option value="Laval">Laval</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Quebec">Quebec</option>
                <optgroup label="PROVINCE"></optgroup>
                    <option value="Quebec">Quebec</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Manitaba">Manitaba</option>
                    <option value="Nouvelle-Ecosse">Nouvelle-Ecosse</option>
            </select><br><br><br>
    


        <label for ="Zipcode" >Zipcode </label>
            <input type="text" id="Zipcode" name="Zipcode" min="1" required=""><br><br><br>

            <button type="submit" > ENREGISTRER  </button>



        </fieldset>
    </form>
    
</body>
</html>