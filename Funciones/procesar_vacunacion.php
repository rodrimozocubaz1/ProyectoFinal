<?php
include_once ("variables.php");

#Si la pagina no se abrio como POST regresar a vacumacion.php 
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../paginas/vacunacion.php");
    exit();
}

$id_u=$_POST["id_u"];
$id_v=$_POST["id_v"];

#comprobar q boton se apretó
if(isset($_POST["b"])){
    #boton regresar. Regresa a vacunacion.php
    header("Location: ../paginas/vacunacion.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

$sql="SELECT * FROM $tab_mascota WHERE $due_mascota='$id_u'";

foreach ($pdo->query($sql) as $fila) {
    $name=$fila[$id_mascota];
    if(isset($_POST[$name])){
        $id_m=$fila[$id_mascota];
        if($_POST[$name]=="i"){
            #boton inscribirse. Inscribir mascota a la vacunacion

            #insertar el id de la vacunacion, de la mascota y del usuario en la tabla vacunas_mascota
            $sql2="INSERT INTO $tab_vacuna_mascota ($idVac_vacuna_mascota, $idUsu_vacuna_mascota, $idMas_vacuna_mascota) 
            VALUES ('$id_v', '$id_u', '$id_m')";

            #ejecutar comando
            $pdo->query($sql2);

            #Regresa a info_vacunacion.php
            header("Location: ../paginas/info_vacunacion.php?v=$id_v");
            exit();
        }elseif($_POST[$name]=="c"){
            #boton cancelar. Retirar a la mascota  de la vacunacion.
    
            #borrar la fila donde se encuentre el id_vacuna con el id_mascota
            $sql2="DELETE FROM $tab_vacuna_mascota WHERE $idVac_vacuna_mascota='$id_v' AND $idMas_vacuna_mascota='$id_m'";

            #ejecutar comando
            $pdo->query($sql2);

            #Regresa a info_vacunacion.php
            header("Location: ../paginas/info_vacunacion.php?v=$id_v");
            exit();
        }
    }
}

?>