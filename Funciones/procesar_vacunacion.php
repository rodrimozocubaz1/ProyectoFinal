<?php
include_once ("variables.php");

#Si la pagina no se abrio como POST regresar a vacumacion.php 
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../paginas/vacunacion.php");
    exit();
}

$id_u=$_POST["id_u"];
$id_v=$_POST["id_v"];

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#comprobar q boton se apretó
if(isset($_POST["b"])){
    #boton regresar. Regresa a vacunacion.php
    header("Location: ../paginas/vacunacion.php");
    exit();
}elseif (isset($_POST["i"])) {
    #boton inscribirse. Inscribir mascota a la vacunacion
    
    $id_m=$_POST["i"];
    #insertar el id de la vacunacion, de la mascota y del usuario en la tabla vacunas_mascota
    $sql="INSERT INTO $tab_vacuna_mascota ($idVac_vacuna_mascota, $idUsu_vacuna_mascota, $idMas_vacuna_mascota) 
    VALUES ('$id_v', '$id_u', '$id_m')";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_vacunacion.php
    header("Location: ../paginas/info_vacunacion.php?v=$id_v");
    exit();
    
}elseif (isset($_POST["c"])) {
    #boton cancelar. Retirar a la mascota  de la vacunacion.
    
    $id_m=$_POST["c"];
    #borrar la fila donde se encuentre el id_vacuna con el id_usuario
    $sql="DELETE FROM $tab_vacuna_mascota WHERE $idVac_vacuna_mascota='$id_v' AND $idMas_vacuna_mascota='$id_m'";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_vacunacion.php
    header("Location: ../paginas/info_vacunacion.php?v=$id_v");
    exit();
}

?>