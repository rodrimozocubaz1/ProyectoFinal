<?php
include_once ("../Funciones/variables.php");
include_once ("../Funciones/verificar_session.php");

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#lista de todos talleres 
$sql="SELECT * FROM $tab_talleres ORDER BY $id_taller ASC";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talleres</title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">  
    <link rel="stylesheet" href="../estilos/estilos_tabla.css">     
</head>
<body>
    <?php include ('../Funciones/cabecera_resto.php') ?>
    <div class="contenido_talleres">
    <h2>Lista de Talleres</h2>
    <table>
    <tr>
        <td>Nombre</td>
        <td>Descripción</td>
        <td>Capacidad</td>
        <td>Más Info</td>
    </tr>
    <?php
        foreach($pdo->query($sql) as $fila){ ?>
            <tr>
                <td><?php echo $fila[$nom_taller] ?></td>
                <td><?php echo $fila[$desc_taller] ?></td>
                <td><?php echo $fila[$capacidad_taller] ?></td>
                <td><a href="info_taller.php?t=<?php echo $fila[$id_taller] ?>">Ver más</a></td>
            </tr>
            <?php
            }
    ?>
    </table>
    </div>

    <?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>