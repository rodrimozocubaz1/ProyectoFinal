<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../index.php");
    exit();
}
include ('variables.php');
#leer datos de post
$nombre_mascota=$_POST["nombre_mascota"];
$raza=$_POST["raza"];
$color=$_POST["color"];
$tamaño=$_POST["tamaño"];
$fotito=$_FILES["foto"]["name"];
$tam_foto=$_FILES["foto"]["size"];
$tipo_foto=$_FILES["foto"]["type"];

if (($fotito == !NULL) && ($_FILES['foto']['size'] <= 200000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["foto"]["type"] == "image/gif")
   || ($_FILES["foto"]["type"] == "image/jpeg")
   || ($_FILES["foto"]["type"] == "image/jpg")
   || ($_FILES["foto"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/fotos/';
      // Muevo la foto desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['foto']['tmp_name'],$directorio.$fotito);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una foto con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   if($fotito == !NULL) echo "La foto es demasiado grande "; 
}


#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

if(isset($_SESSION["$id_usuario"])){

}
#construir comando
$sql="INSERT INTO $tab_mascota ($nom_mascota, $raza_mascota, $color_mascota, $tam_mascota, $foto_mascota, $due_mascota) 
VALUES ('$nombre_mascota', '$raza', '$color','$tamaño','$fotito')";

#ejecutar comando
$pdo->query($sql);

#redirigir
header("Location: ../paginas/login.php?k=registrada");




?>