<?php
include_once ("variables.php");

#Si la pagina no se abrio como POST regresar a taller.php 
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../paginas/vacunacion.php");
    exit();
}

$id_u=$_POST["id_u"];
$id_v=$_POST["id_v"];

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#comprobar q boton se apreto
if(isset($_POST["b"])){
    #boton regresar. Regresa a talleres.php
    header("Location: ../paginas/vacunacion.php");
    exit();
}elseif (isset($_POST["i"])) {
    #boton inscribirse. Inscribir usuario a la vacunacion
    
    #insertar el id de la vacunacion y del usuario en la tabla vacunas_usuario
    $sql="INSERT INTO $tab_vacuna_usuario ($idVac_vacuna_usuario, $idUsu_vacuna_usuario) VALUES ('$id_v', '$id_u')";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_vacunacion.php
    header("Location: ../paginas/info_vacunacion.php?v=$id_v");
    exit();
    
}elseif (isset($_POST["c"])) {
    #boton cancelar. Retirar al usuario de la vacunacion.
    
    #borrar la fila donde se encuentre el id_vacuna con el id_usuario
    $sql="DELETE FROM $tab_vacuna_usuario WHERE $idVac_vacuna_usuario='$id_v' AND $idUsu_vacuna_usuario='$id_u'";

    #ejecutar comando
    $pdo->query($sql);

    #Regresa a info_vacunacion.php
    header("Location: ../paginas/info_vacunacion.php?v=$id_v");
    exit();
}

?>