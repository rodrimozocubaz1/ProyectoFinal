<?php 
include_once ('../Funciones/variables.php');
include_once ('../Funciones/verificar_session.php');

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#buscar  mascotas sin dueño
$sql="SELECT * FROM $tab_mascota WHERE $due_mascota IS NULL ORDER BY $id_mascota ASC";

?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adopción</title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/estilos_tabla.css">
</head>
<body>
<?php include ('../Funciones/cabecera_resto.php') ?>

<div class="contenido-adopcion">
    <h2>Mascotas para Adopción</h2>
    <?php if(isset($_GET["a"])){ 
        if($_GET["a"]=="0"){ ?>
    <p style="color:blue">No seleccionó mascotas para adoptar</p>
    <?php } else { ?>
    <p style="color:green">Muchas gracias. Usted adoptó a <?php echo $_GET["a"] ?> mascota(s)</p>
    <p>Nos contactaremos con usted muy pronto para seguir con el proceso</p>
    <?php }} ?>

    <form action="../Funciones/procesar_adopcion.php" method="post">
    <input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
        <table>
            <tr>
                <td></td>
                <td>Nombre</td>
                <td>Raza</td>
                <td>Tamaño</td>
                <td>Color</td>
                <td>Foto</td>
            </tr>
            <?php
                foreach($pdo->query($sql) as $fila){ ?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $fila[$id_mascota] ?>" value="1"></td>
                        <td><?php echo $fila[$nom_mascota] ?></td>
                        <td><?php echo $fila[$raza_mascota] ?></td>
                        <td><?php echo $fila[$tam_mascota] ?></td>
                        <td><?php echo $fila[$color_mascota] ?></td>
                        <td><?php if($fila[$foto_mascota]!=NULL){ ?>
                        <img src=<?php echo $fila[$foto_mascota] ?> alt="foto <?php echo $fila[$nom_mascota] ?>" width="150" > <?php } ?>
                        </td>
                    </tr>
                    <?php
                    }
            ?>
        </table>
        <div class="botones_adopcion">
            <button type="submit">Adoptar seleccionados</button>
            <button type="submit" name="b">Regresar a inicio</button>
        </div>
    </form>
</div>

<?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>