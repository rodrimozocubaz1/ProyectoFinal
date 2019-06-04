<?php
include ("../Funciones/variables.php");

if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../index.php");
    exit();
}

$pdo=new PDO("mysql:host=localhost;dbname='$dbname';charset=utf8","root","");

#leer datos de post
$usuario=$_POST["u"];
$password=$_POST["p"];
$sesion=$_POST["s"];
$regresar=$_POST["b"];


?>