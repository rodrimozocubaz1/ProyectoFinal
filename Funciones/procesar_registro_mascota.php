<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../index.php");
    exit();
}
include ('variables.php');
#leer datos de post
$nombre_mascota=$_POST["nombre_mascota"];
$raza=$_POST["raza"];
$color=$_POST["color"];
$tamaño=$_POST["tamaño"];
$fotito=$_POST["foto"]


#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

$U_repetido=$pdo->query("SELECT * FROM $tab_usuario WHERE $user_usuario='$usuario'");
$fila=$U_repetido->fetchAll();
#construir comando
$sql="INSERT INTO $tab_usuario ($nom_mascota, $raza_mascota, $color_mascota, $tam_mascota, $foto_mascota) 
VALUES ('$nombre_mascota', '$raza', '$color','$fotito')";

#ejecutar comando
$pdo->query($sql);

#redirigir
header("Location: ../paginas/login.php?k=registrada");




?>