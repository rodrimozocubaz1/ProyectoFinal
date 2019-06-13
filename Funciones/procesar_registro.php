<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../index.php");
    exit();
}
include ('variables.php');
#leer datos de post
$usuario=$_POST["usuario"];
$nombre=$_POST["nombres"];
$apellido=$_POST["apellidos"];
$email=$_POST["email"];
$fecha_nac=$_POST["fecha_nac"];
$password=$_POST["password1"];
$password2=$_POST["password2"];
$direccion=$_POST["direccion"];


if($password!=$password2){
    header("Location: ../paginas/registrarse.php?p=pass");
    exit();
}

#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

$U_repetido=$pdo->query("SELECT * FROM $tab_usuario WHERE $user_usuario='$usuario'");
$fila=$U_repetido->fetchAll();
if(count($fila)==0){
    $pass=md5($password);

    #construir comando
    $sql="INSERT INTO $tab_usuario ($user_usuario, $nom_usuario, $ape_usuario, $email_usuario, $fecha_nac_usuario, $dir_usuario, $pass_usuario) 
    VALUES ('$usuario', '$nombre', '$apellido', '$email', '$fecha_nac', '$direccion', '$pass')";

    #ejecutar comando
    $pdo->query($sql);

    #redirigir
    header("Location: ../paginas/login.php");

}
else{
    header("Location: ../paginas/registrarse.php?u=repetido");
    exit();
}



?>