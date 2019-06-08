<?php 
include_once ('../Funciones/variables.php');
include_once ('../Funciones/verificar_session.php');

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#buscar  mascotas sin dueño
$sql="SELECT * FROM $tab_mascota WHERE $due_mascota IS NULL ORDER BY id DESC";

?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adopción</title>
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
</head>
<body>
<?php include ('../Funciones/cabecera_resto.php') ?>

<h2>Mascotas para Adopción</h2>
<?php if(isset($_GET["a"])){ 
    if($_GET["a"]==0){ ?>
<p style="color:blue">No seleccionó mascotas para adoptar</p>
<?php } else { ?>
<p style="color:green">Usted adoptó a <?php echo $_GET["a"] mascota(s)?></p>
<p>Nos contactaremos con usted muy pronto para seguir el trámite</p>
<?php }} ?>

<form action="../Funciones/procesar_adopcion.php" method="post">
<button type="submit">Adoptar Seleccionados</button>
<button type="submit" name="b">Regresar a inicio</button>
<table>
    <tr>
        <td></td>
        <td>Nombre</td>
        <td>Raza</td>
        <td>Tamaño</td>
        <td>Color</td>
    </tr>
    <?php
        foreach($pdo->query($sql) as $fila){ ?>
            <tr>
                <td><input type="checkbox" name=<?php echo $fila[$id_mascota] ?> id="" value="1"></td>
                <td><?php echo $fila[$nom_mascota] ?></td>
                <td><?php echo $fila[$raza_mascota] ?></td>
                <td><?php echo $fila[$tam_mascota] ?></td>
                <td><?php echo $fila[$color_mascota] ?></td>
            </tr>
            <?php
            }
    ?>
</table>
</form>

<?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>