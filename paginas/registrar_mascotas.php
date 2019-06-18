<?php 
include ("../Funciones/variables.php");
include ("../Funciones/verificar_session.php");

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}

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
    <link rel="stylesheet" href="../estilos/estilos_login.css">
    
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
    <form action="../Funciones/procesar_registro_mascota.php" method="post" enctype="multipart/form-data">
        <div class="elemento">
            Nombre Mascota: <br>
            <input id="nombres" type="text" placeholder="&#128272; Nombres" name="nombre_mascota" required>
        </div>
        <div class="elemento">
            Raza:<br>
            <input id="raza" type="text" placeholder="&#128272; Raza" name="raza" required>
        </div>
        <div class="elemento">
            Color:<br>
            <input id="color" type="text" placeholder="&#128272; Color" name="color" required>              
        </div>
        <div class="elemento">
            Tamaño:<br>
            <input id="tamano" type="text" placeholder="&#128272; Tamaño" name="tamano" required>             
        </div>
        <div class="elemento">
            <label for="foto">Foto:</label> 
            <input type="file" name="foto" />
        </div>
        
            <button type="submit" class="elemento">Registrar Mascota</button>
        
    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>