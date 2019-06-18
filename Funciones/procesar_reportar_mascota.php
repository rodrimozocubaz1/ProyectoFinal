<?php
include ("../Funciones/variables.php");
include ("../Funciones/verificar_session.php");


#leer datos de post
$nombre_mascota=$_POST["nombre"];
$raza=$_POST["raza"];
$color=$_POST["color"];
$tamano=$_POST["tamano"];
$fotito=$_FILES["foto"]["name"];
$tam_foto=$_FILES["foto"]["size"];
$tipo_foto=$_FILES["foto"]["type"];

// Ruta donde se guardarán las imágenes que subamos
$directorio = '../uploads/fotos/';
$nombre_file=date("Y-m-d")."_".time()."_".$_FILES["foto"]["name"];
$target_file=$directorio.$nombre_file;

if (($fotito == !NULL) && ($_FILES['foto']['size'] <= 5000000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["foto"]["type"] == "image/gif")
   || ($_FILES["foto"]["type"] == "image/jpeg")
   || ($_FILES["foto"]["type"] == "image/jpg")
   || ($_FILES["foto"]["type"] == "image/png"))
   {
      
      // Muevo la foto desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['foto']['tmp_name'],$target_file);
    } 
    else 
    {
       //si no cumple con el formato
       //echo "No se puede subir una foto con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   //if($fotito == !NULL) echo "La foto es demasiado grande "; 
}


#instanciar pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");

#construir comando
$sql="INSERT INTO 
$tab_mascota ($nom_mascota, $raza_mascota, $color_mascota, $tam_mascota, $foto_mascota) 
VALUES ('$nombre_mascota', '$raza', '$color','$tamano','$target_file')";

#ejecutar comando
$pdo->query($sql);

#redirigir
header("Location: ../paginas/reportar_mascota.php");

?>