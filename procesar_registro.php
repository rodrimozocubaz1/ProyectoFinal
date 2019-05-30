<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: index.php");
}
include('variables.php');
#leer datos de post
$usuario=$_POST["u"];
$nombre=$_POST["n"];
$apellido=$_POST["a"];
$email=$_POST["e"];
$fecha_nac=$_POST["f"];
$password=$_POST["p1"];
$password2=$_POST["p2"];

if($password!=$password2){
    header("Location: registrarse.php?m=pass");
    exit();
}

$pass=md5($password);
#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname='$db';charset=utf8","root","");

#construir comando
$sql="INSERT INTO $tab_usuario VALUES (NULL,'$usuario', $nombre, $apellido, $fecha_nac '$email', '$pass')";

#ejecutar comando
$pdo->query($sql);

#redirigir
header("Location: index.php");

?>