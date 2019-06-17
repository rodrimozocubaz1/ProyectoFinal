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
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
</head>
<body>
    <?php include ("../Funciones/cabecera_resto.php"); ?>
    <div class="contenido">
    <h2>Datos Personales</h2>
    <form action="../Funciones/cambiar_datos.php" method="post">
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
        <div>
        <button type="submit">Guardar Cambios</button>
        </div>
    </form>
    <h2>Lista de Mascotas</h2>
    <form action="../paginas/registrar_mascotas.php" method="get">
    <button type="submit">Agregar Mascota</button>
    </form>
    <table>
        <tr>
            <td>Nombre</td>
            <td>Raza</td>
            <td>Color</td>
            <td>Tamaño</td>
            <td>Foto</td>
        </tr>
        <?php
        foreach ($pdo->query($sql) as $fila) { ?>
        <tr>
            <td><?php echo $fila[$nom_mascota] ?></td>
            <td><?php echo $fila[$raza_mascota] ?></td>
            <td><?php echo $fila[$color_mascota] ?></td>
            <td><?php echo $fila[$tam_mascota] ?></td>
            <td>
            <?php if($fila[$foto_mascota]!=NULL){ ?>
            <img src="<?php echo $fila[$foto_mascota] ?>" alt="foto <?php echo $fila[$nom_mascota] ?>">
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