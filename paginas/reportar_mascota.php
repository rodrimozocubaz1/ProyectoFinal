<?php 
include ("../Funciones/variables.php");
include ("../Funciones/verificar_sesion.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportar Mascota Perdida</title>
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/registrarse.css">
</head>

<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
    <div class="contenido">
    <?php
    if(isset($GET["p"])){
        if($GET["P"]=="pass"){ ?>
            <p style="color:red">Error en el password</p>
        <?php }

    } ?>
    <?php
    if(isset($GET["u"])){
        if($GET["u"]=="repetido"){ ?>
            <p style="color:red">Nickname ya existente</p>

        <?php }
    } ?>
    <form action="../Funciones/procesar_reportar_mascota.php" method="post">

        <div>
            Nombre: <br>
            <input id="nombre" type="text" name="nombre">
        </div>
        <div>
            Raza:<br>
            <input id="raza" type="text" name="raza">
        </div>
        <div>
            Color:<br>
            <input id="color" type="text" name="color">
        </div>
        <div>
            Tamaño:<br>
            <input id="tamano" type="text" name="tamano">             
        </div>
        <div>
            Fecha:<br>
            <input id="fecha" type="date" name="fecha" >
        </div>
        <div>
            Foto:<br>
            <input type="file" name="foto" id="">
        </div>
        <div>
            <input type="submit" value="Reportar Mascota">
        </div>

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>