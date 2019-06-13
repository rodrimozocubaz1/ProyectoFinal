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
        if($GET["U"]=="repetido"){ ?>
            <p style="color:red">Nickname ya existente</p>

        <?php }
    } ?>
    <form action="../Funciones/procesar_registro.php" method="post">

        <div>
            Nickname:<br>
            <input id="usuario" type="text" placeholder="&#128272; Usuario" name="usuario" required>
        </div>
        <div>
            Nombres: <br>
            <input id="nombres" type="text" placeholder="&#128272; Nombres" name="nombres" required>
        </div>
        <div>
            Apellidos:<br>
            <input id="apellidos" type="text" placeholder="&#128272; Apellidos" name="apellidos" required>
        </div>
        <div>
            Email:<br>
            <input id="email" type="email" placeholder="&#128272; Email" name="email" required>              
        </div>
        <div>
            Fecha de Nacimiento:<br>
            <input id="fecha_nac" type="date" placeholder="&#128272; Nacimiento" name="fecha_nac" required>             
        </div>
        <div>
            Direccion:<br>
            <input id="direccion" type="text" placeholder="&#128272; Direccion" name="direccion" required>               
        </div>
        <div>
            Contraseña:<br>
            <input id="password1" type="password" placeholder="&#128272; Contraseña" name="password1" required>               
        </div>
        <div>
            Confirmar contraseña:<br>
            <input id="password2" type="password" placeholder="&#128272; Confirmar Contraseña" name="password2"><br>               
        </div>
        <div>
            <input type="submit" value="Registrarse">
            
        </div>

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>