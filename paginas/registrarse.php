<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($GET["p"])){
        if($GET["P"]=="pass"){?>
            <p style="color:red">Error en el password</p>
        <?php}

    }
    ?>
    <form action="procesar_insertar.php" method="post">

        <div>
            Nickname:<br>
            <input id="usuario" type="text" name="usuario" required>
        </div>
        <div>
            Nombres: <br>
            <input id="nombres" type="text" name="nombres" required>
        </div>
        <div>
            Apellidos:<br>
            <input id="apellidos" type="text" name="apelidos" required>
        </div>
        <div>
            Email:<br>
            <input id="email" type="email" name="email" required><br>               
        </div>
        <div>
            Fecha de Nacimiento:<br>
            <input id="fecha_nac" type="date" name="fecha_nac" required><br>               
        </div>
        <div>
            Direccion:<br>
            <input id="direccion" type="text" name="direccion" required><br>               
        </div>
        <div>
            Contraseña:<br>
            <input id="password1" type="password" name="password1" required><br>               
        </div>
        <div>
            Confirmar contraseña:<br>
            <input id="password2" type="password" name="password2"><br>               
        </div>
        <div>
            <input type="submit" value="Registrarse">
            
        </div>

    </form>
</body>
</html>