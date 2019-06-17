<?php 
include ("../Funciones/variables.php");
include ("../Funciones/verificar_session.php");
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
    <form action="../Funciones/procesar_reportar_mascota.php" method="post" enctype="multipart/form-data">
        <?php
        if(isset($GET["r"])){
            if($GET["r"]=="ok"){ ?>
                <p style="color:green">Mascota reportada con éxito. Gracias</p>
            <?php }

        } ?>
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
            <label for="foto">Foto:</label> 
            <input name="foto" type="file" />
        </div>
        <div>
            <input type="submit" value="Reportar Mascota">
        </div>

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>