<?php
include ('../Funciones/variables.php');
include ('../Funciones/verificar_session.php');

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}
$id_u=$_SESSION["id"];
#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#buscar mascotas del usuario
$sql="SELECT * FROM $tab_mascota WHERE $due_mascota='$id_u'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de <?php echo $_SESSION["usuario"] ?></title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/estilos_tabla.css">
</head>
<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
    <div class="contenido_usuario">
        
        <form action="../Funciones/cambiar_datos.php" method="post">
        <fieldset>
        <legend><h2>Datos Personales</h2></legend>
            <input type="hidden" name="i" value="<?php echo $_SESSION["id"] ?>">
            <div>
                <label for="">Nombres:</label><br>
                <input type="text" name="n" value="<?php echo $_SESSION["nombres"] ?>">
            </div>
            <div>
                <label for="">Apellidos:</label><br>
                <input type="text" name="a" value="<?php echo $_SESSION["apellidos"] ?>">
            </div>
            <div>
                <label for="">Email:</label><br>
                <input type="email" name="e" value="<?php echo $_SESSION["email"] ?>">
            </div>
            <div>
                <label for="">Dirección:</label><br>
                <input type="text" name="d" value="<?php echo $_SESSION["direccion"] ?>">
            </div>
            <div><label for="">Fecha de Nacimiento:</label><br> 
            <input type="date" name="f" value="<?php echo $_SESSION["fecha_nac"] ?>">      
            </div>
            <div class="botones_usuario">
                <button type="submit" class="botones">Guardar Cambios</button>
            </div>
        </fieldset>
        </form>
        <h2>Lista de Mascotas</h2>
        <form action="../paginas/registrar_mascotas.php" method="get">
        <div class="botones_usuario">
            <button type="submit" class="botones">Agregar Mascota</button>
        </div>
        </form>
    </div>
    <div class="tabla">
        <table class="mascotas">
            <tr>
                <th>Nombre</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Tamaño</th>
                <th class="imagen_perro">Foto</th>
            </tr>
            <?php
            foreach ($pdo->query($sql) as $fila) { ?>
            <tr>
                <td><?php echo $fila[$nom_mascota] ?></td>
                <td><?php echo $fila[$raza_mascota] ?></td>
                <td><?php echo $fila[$color_mascota] ?></td>
                <td><?php echo $fila[$tam_mascota] ?></td>
                <td class="imagen_perro">
                <?php if($fila[$foto_mascota]!=NULL){ ?>
                
                    <img src="<?php echo $fila[$foto_mascota] ?>" alt="foto <?php echo $fila[$nom_mascota] ?>" height="150px">
                
                <?php }else { ?>
                Sin foto
                <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
                
    <?php include ("../Funciones/footer_resto.php"); ?>
</body>
</html>