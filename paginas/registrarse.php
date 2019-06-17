<?php 
include ("../Funciones/variables.php");
include ("../Funciones/verificar_session.php");
if (isset($_SESSION["id"])) {
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../estilos/registrarse.css">
    
</head>

<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
    <div class="contenido">
    
    <form action="../Funciones/procesar_registro.php" method="post">
    <?php
    if(isset($_GET["p"])){
        if($_GET["p"]=="pass"){ ?>
            <p style="color:red">Error en el password</p>
        <?php }

    } ?>
    <?php
    if(isset($_GET["u"])){
        if($_GET["u"]=="repetido"){ ?>
            <p style="color:red; font-size: 3rem;">Nickname ya existente</p>

        <?php }
    } ?>

        <div class="elemento">
            Nickname:<br>
            <input id="usuario" type="text" placeholder=" Usuario" name="usuario" required>
        </div>
        <div class="elemento">
            Nombres: <br>
            <input id="nombres" type="text" placeholder=" Nombres" name="nombres" required>
        </div>
        <div class="elemento">
            Apellidos:<br>
            <input id="apellidos" type="text" placeholder=" Apellidos" name="apellidos" required>
        </div>
        <div class="elemento">
            Email:<br>
            <input id="email" type="email" placeholder=" Email" name="email" required>              
        </div>
        <div class="elemento">
            Fecha de Nacimiento:<br>
            <input id="fecha_nac" type="date" placeholder=" Nacimiento" name="fecha_nac" required>             
        </div>
        <div class="elemento">
            Direccion:<br>
            <input id="direccion" type="text" placeholder=" Direccion" name="direccion" required>               
        </div>
        <div class="elemento">
            Contraseña:<br>
            <input id="password1" type="password" placeholder=" Contraseña" name="password1" required>               
        </div>
        <div class="elemento">
            Confirmar contraseña:<br>
            <input id="password2" type="password" placeholder=" Confirmar Contraseña" name="password2"><br>               
        </div>
        <div class="elemento">
            <input type="submit" value="Registrarse">
            
        </div>
        

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>