<?php
include_once ("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Resulat</title>
</head>
<body>
<?php

$dbName = 'ecom1_tp2';
$tableName = 'address';

$conn = mysqli_connect('localhost','root','','ecom1_tp2');
$query = "SELECT * FROM " . $tableName;

$result1 = mysqli_query ($conn , $query);
$result = mysqli_fetch_all ($result1);
$result = array_reverse ($result);
foreach($result as $res) {
    $address['id'] = $res[0];
    $address['street'] = $res[1];
    $address['street_nb'] = $res[2];
    $address['type'] = $res[3];
    $address['city'] = $res[4];
    $address['zipcode'] = $res[5];
    
    echo addressFields(0, $address, true);
    echo "<br>";
}
?>
</body>
</html>
