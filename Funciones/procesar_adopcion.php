<?php
include_once ("variables.php");

#verifica se se entro por post o si se entro con boton regresar
if($_SERVER['REQUEST_METHOD']!='POST' || isset($_POST["b"])){
    header("Location: ../index.php");
    exit();
}

$id_user=$_POST["id_u"];

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#buscar mascotas sin dueño
$sql="SELECT * FROM $tab_mascota WHERE $due_mascota IS NULL";
$counter=0;
foreach ($pdo->query($sql) as $fila) {
    #verificar si existe el checkbox de la mascota esta activada
    $id_m=$fila[$id_mascota];
    if(isset($_POST[$id_m])){
        #agregar como dueño de dicha mascota el id de usuario 
        
        $sql2="UPDATE $tab_mascota SET $due_mascota = '$id_user' WHERE $id_mascota='$id_m'";
        $pdo->query($sql2);
        $counter++;
    }
}
header("Location: ../paginas/adopcion.php?a=$counter");

?>