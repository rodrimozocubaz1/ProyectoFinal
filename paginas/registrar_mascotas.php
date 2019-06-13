<?php 
include ("../Funciones/variables.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/registrarse.css">
    
</head>

<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
<div class="contenido">
    <?php
    if(isset($_GET["k"])){
        if($_GET["k"]=="reistrada"){ ?>
            <p style="color:red">Mascota registrada :)</p>
        <?php }

    } ?>
    <form action="../Funciones/procesar_registro_mascota.php" method="post">

        
        <div>
            Nombre Mascota: <br>
            <input id="nombres" type="text" placeholder="&#128272; Nombres" name="nombre_mascota" required>
        </div>
        <div>
            Raza:<br>
            <input id="raza" type="text" placeholder="&#128272; Raza" name="raza" required>
        </div>
        <div>
            Color:<br>
            <input id="color" type="text" placeholder="&#128272; Color" name="color" required>              
        </div>
        <div>
            Tamaño:<br>
            <input id="tamaño" type="text" placeholder="&#128272; Tamaño" name="tamaño" required>             
        </div>
        <div>
            Foto:<br>
            <input id="tamaño" type="file" placeholder="&#128272; Tamaño" name="foto" required>             
        </div>

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>