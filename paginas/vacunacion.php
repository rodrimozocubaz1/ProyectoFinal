<?php
include_once ("../Funciones/variables.php");
include_once ("../Funciones/verificar_sesSion.php");

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
#Lista de vacunacion 
$sql="SELECT * FROM $tab_vacunas ORDER BY $id_vacunas ASC";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Campañas de Vacunación</title>
    <link rel="stylesheet" href="../estilos/estilonosotros.css">    
</head>
<body>
    <?php include ('../Funciones/cabecera_resto.php') ?>
    <h2>Lista de Campañas de Vacunación</h2>
    <table>
    <tr>
        <td>Vacuna</td>
        <td>Descripción</td>
        <td>Capacidad</td>
        <td>Más Info</td>
    </tr>
    <?php
        foreach($pdo->query($sql) as $fila){ ?>
            <tr>
                <td><?php echo $fila[$nom_vacunas] ?></td>
                <td><?php echo $fila[$desc_vacunas] ?></td>
                <td><?php echo $fila[$capacidad_vacunas] ?></td>
                <td><a href="info_vacunacion.php?v=<?php echo $fila[$id_vacunas] ?>">Ver más</a></td>
            </tr>
            <?php
            }
    ?>
    </table>

    <?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>