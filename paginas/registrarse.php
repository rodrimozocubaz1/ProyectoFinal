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
        <script>
            function myFunction() {
            var x = document.getElementById("myNav");
            if (x.className === "navegacion") {
                x.className += " responsive";
            } else {
                x.className = "navegacion";
            }
            }
            </script>

    </form>
</div>
<?php include ("../Funciones/footer_resto.php"); ?>  
</body>  
 
</html>