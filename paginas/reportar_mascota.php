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
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/estilos_login.css">
</head>

<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
    <div class="contenido-reportar">
    <form action="../Funciones/procesar_reportar_mascota.php" method="post" enctype="multipart/form-data">
        <?php
        if(isset($GET["r"])){
            if($GET["r"]=="ok"){ ?>
                <p style="color:green">Mascota reportada con éxito. Gracias</p>
            <?php }

        } ?>       
            
            <div class="elemento">
                Nombre: <br>
                <input id="nombre" type="text" name="nombre">
            </div>
            <div class="elemento">
                Raza:<br>
                <input id="raza" type="text" name="raza">
            </div>
            <div class="elemento">
                Color:<br>
                <input id="color" type="text" name="color">
            </div>
            <div class="elemento">
                Tamaño:<br>
                <input id="tamano" type="text" name="tamano">             
            </div>
            <div class="elemento">
                <label for="foto">Foto:</label> 
                <input name="foto" type="file" />
            </div>
            <div class="elemento elemento_ultimo">
                <input type="submit" value="Reportar Mascota">
            </div>
        

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>