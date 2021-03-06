<?php

#inicia sesion
session_start();

#entra si no existe la variable id guardada en la sesion
if(!isset($_SESSION["id"])){
    
    #entra si existe una cookie guardada con la id del usuario
    if(isset($_COOKIE["id_usuario"])){
        $id=$_COOKIE["id_usuario"];
        
        #crear pdo
        $pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
    
        #construir comando
        $sql="SELECT * 
        FROM $tab_usuario 
        WHERE $id_usuario = '$id'";
    
        #ejecutar comando
        $resultado=$pdo->query($sql);
        $fila=$resultado->fetch();
    
        #se guardan las variables usuario, nombres, apellidos y email
        $_SESSION["id"]=$id;
        $_SESSION["usuario"]=$fila[$user_usuario];
        $_SESSION["nombres"]=$fila[$nom_usuario];
        $_SESSION["apellidos"]=$fila[$ape_usuario];
        $_SESSION["email"]=$fila[$email_usuario];
        $_SESSION["direccion"]=$fila[$dir_usuario];
        $_SESSION["fecha_nac"]=$fila[$fecha_nac_usuario];
    }
}

?>