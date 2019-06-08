<?php
include_once ("variables.php");
include_once ('verificar_session.php');

#verifica se se entro por post o si se entro con boton regresar
if($_SERVER['REQUEST_METHOD']!='POST' || isset($_POST["b"])){
    header("Location: ../index.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#buscar mascotas sin dueño
$sql="SELECT * FROM $tab_mascota WHERE $due_mascota IS NULL ORDER BY id DESC";

foreach ($pdo->query($sql) as $fila) {
    
    if(isset($_POST[$fila[$id_mascota]])){
        $id_m=$fila[$id_mascota];
        $user=$_SESSION["usuario"];
        $sql2="UPDATE $tab_mascota SET $due_mascota = '$user' WHERE $id_mascota='$id_m'";
    }

}
#leer datos de post
$usuario=$_POST["u"];
$password=$_POST["p"];
$regresar=$_POST["b"];


?>