<?php
include ("../Funciones/variables.php");
include ("../Funciones/verificar_session.php");
#verifica se se entro por post
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../index.php");
    exit();
}

$id=$_POST["i"];
$nom=$_POST["n"];
$ape=$_POST["a"];
$email=$_POST["e"];
$dir=$_POST["d"];
$fecha=$_POST["f"];

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#actualizar datos del usuario
$sql="UPDATE $tab_usuario 
SET $nom_usuario='$nom', $ape_usuario='$ape', $email_usuario='$email', $dir_usuario='$dir', 
$fecha_nac_usuario='$fecha'
WHERE $id_usuario='$id'";
#ejecutar comando
$pdo->query($sql);

$_SESSION["nombres"]=$nom;
$_SESSION["apellidos"]=$ape;
$_SESSION["email"]=$email;
$_SESSION["direccion"]=$dir;
$_SESSION["fecha_nac"]=$fecha;

header("Location: ../paginas/usuario.php");
?>