<?php 
include 'variables.php';

$pdo=new PDO("mysql:host=localhost;dbname=tupet;charset=utf8","root","");
$sql="SELECT * FROM mascotas WHERE $due_mascota = NULL ORDER BY id ASC";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>