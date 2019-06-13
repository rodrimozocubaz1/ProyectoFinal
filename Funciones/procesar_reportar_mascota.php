<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
    header("Location: ../paginas/reportar_mascota.php");
    exit();
}
include ('variables.php');
#leer datos de post
$nombre=$_POST["nombre"];
$raza=$_POST["raza"];
$color=$_POST["color"];
$tamano=$_POST["tamano"];
$nom_foto=$_FILES["foto"]["name"];
$tam_foto=$_FILES["foto"]["size"];
$tipo_foto=$_FILES["foto"]["type"];

if (($nom_foto == !NULL) && ($_FILES['foto']['size'] <= 200000)) 
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
      move_uploaded_file($_FILES['foto']['tmp_name'],$directorio.$nom_foto);
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
   if($nombre_img == !NULL) echo "La foto es demasiado grande "; 
}

#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#construir comando
$sql="INSERT INTO $tab_mascota ($nom_mascota, $tam_mascota, $raza_mascota, $color_mascota, $foto_mascota) 
VALUES ('$nombre', '$tamano', '$raza', '$color', '$nom_foto')";

#ejecutar comando
$pdo->query($sql);

#redirigir
header("Location: ../paginas/reportar_mascota.php?r=ok");
?>