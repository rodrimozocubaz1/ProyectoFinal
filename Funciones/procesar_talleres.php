<?php
include_once ("variables.php");

#Si la pagina no se abrio como POST regresar a taller.php 
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../paginas/talleres.php");
    exit();
}

$id_u=$_POST["id_u"];
$id_t=$_POST["id_t"];

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#comprobar q boton se apreto
if(isset($_POST["b"])){
    #boton regresar. Regresa a talleres.php
    header("Location: ../paginas/talleres.php");
    exit();
}elseif (isset($_POST["i"])) {
    #boton inscribirse. Inscribir usuario al taller
    
    #insertar el id del taller y del usuario en la tabla taller_usuario
    $sql="INSERT INTO $tab_taller_usuario ($idTal_taller_usuario, $idUsu_taller_usuario) VALUES ('$id_t', '$id_u')";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_taller.php
    header("Location: ../paginas/info_taller.php?t=$id_t");
    exit();
    
}elseif (isset($_POST["c"])) {
    #boton cancelar. Retirar al usuario del taller.
    
    #borrar la fila donde se encuentre el id_taller con el id_usuario
    $sql="DELETE FROM $tab_taller_usuario WHERE $idTal_taller_usuario='$id_t' AND $idUsu_taller_usuario='$id_u'";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_taller.php
    header("Location: ../paginas/info_taller.php?t=$id_t");
    exit();
}

?>