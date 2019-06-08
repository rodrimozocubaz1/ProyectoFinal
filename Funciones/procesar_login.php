<?php
include_once ("variables.php");

#verifica se se entro por post o si se entro con boton regresar
if($_SERVER['REQUEST_METHOD']!='POST' || isset($_POST["b"])){
    header("Location: ../index.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#leer datos de post
$usuario=$_POST["u"];
$password=$_POST["p"];
$regresar=$_POST["b"];

#construir comando
$sql="SELECT $id_usuario,$user_usuario,$pass_usuario,$nom_usuario,$ape_usuario,$email_usuario 
FROM $tab_usuario 
WHERE $user_usuario = '$usuario'";

#ejecutar comando
$resultado=$pdo->query($sql);
$fila=$resultado->fetchAll();

#verifica si hay un usuario con el nombre de usuario proporcionado
if(count($fila)==1){
    if($fila[0][$pass_usuario]==md5($password)){
        #login satisfactorio
        #se inicia la sesion y se guardan las variables id, usuario, nombres, apellidos y email
        session_start();
        $_SESSION["id"]=$fila[0][$id_usuario];
        $_SESSION["usuario"]=$fila[0][$user_usuario];
        $_SESSION["nombres"]=$fila[0][$nom_usuario];
        $_SESSION["apellidos"]=$fila[0][$ape_usuario];
        $_SESSION["email"]=$fila[0][$email_usuario];

        #entra si desea crear la cookie
        if(isset($_POST["s"]) && $_POST["s"]=="1"){
            #verificar que no exista la cookie
            if(!isset($_COOKIE["id"])){
                #crear cookie id con valor del nombre de usuario proporcionado, duracion un mes
                setcookie("id",$fila[0][$id_usuario], time()+60*60*24*30);
            }
        }
        #regresar a index
        header("Location: ../index.php");
    }else{
        #si el pass es diferente regresar a login con m=p
        header("Location: ../paginas/login.php?m=p");
        exit();
    }
    
}else{
    #si no hay usuario regresar a login con variable m=u
    header("Location: ../paginas/login.php?m=u");
    exit();
}

?>