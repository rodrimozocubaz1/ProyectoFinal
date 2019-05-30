
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if(isset($_GET["m"])){ 
    if($_GET["m"]=="pass"){?>
<p style="color:red">Error. Los passwords son diferentes</p>
<?php } if($_GET["m"]=="ok"){?>
<p style="color:green">Usuario creado con exito</p>
<?php }} ?>

    <form action="procesar_usuario.php" method="post">
    <div>
        Nombre de Usuario:<br>
        <input type="text" name="u" id="">
    </div>
    <div>
        Nombres:<br>
        <input type="text" name="n" id="">
    </div>
    <div>
        Apellidos:<br>
        <input type="text" name="a" id="">
    </div>
    <div>
        Email:<br>
        <input type="email" name="e" id="">
    </div>
    <div>
        Fecha de Nacimiento:<br>
        <input type="date" name="" id="f">
    </div>
    <div>
        Password:<br>
        <input type="password" name="p1" id="">
    </div>
    <div>
        Confirmar Password:<br>
        <input type="password" name="p2" id="">
    </div>
    <button type="submit" name="enviar">Enviar</button>
    <button type="submit" name="regresar">Regresar a Index</button>
    </form>
</body>
</html>