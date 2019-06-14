<?php
include_once ("../Funciones/variables.php");
include_once ("../Funciones/verificar_session.php");

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
if(isset($_GET["v"])){
    $id=$_GET["v"];    
    #info de la vacunacion seleccionada
    $sql="SELECT * FROM $tab_vacunas WHERE $id_vacunas='$id'";

    #ejecutar comando
    $resultado=$pdo->query($sql);
    $filas=$resultado->fetchAll();
    
    #entra al if si escribieron un id de vacunacion q no existe
    if (count($filas)==0) {
        header("Location: ../paginas/vacunacion.php");
        exit();    
    }else{
        $nom=$filas[0][$nom_vacunas];
        
        #revisar que usuarios estan inscritos en la vacunacion
        $sql2="SELECT * FROM $tab_vacuna_usuario WHERE $idVac_vacuna_usuario='$id'";
        #ejecutar comando2
        $resultado2=$pdo->query($sql2);
        $filas2=$resultado2->fetchAll();

        #cuantos cupos disponibles quedan
        $disponible=$filas[0][$capacidad_vacunas]-count($filas2);

        #verificar si el usuario ya esta inscrito en la vacunacion
        $id_usuario_sesion=$_SESSION["id"];
        $sql3="SELECT * FROM $tab_vacuna_usuario WHERE $idVac_vacuna_usuario='$id' AND $idUsu_vacuna_usuario='$id_usuario_sesion'";
        #ejecutar comando3
        $resultado3=$pdo->query($sql3);
        $filas3=$resultado3->fetchAll();
    }
}else{
    header("Location: ../paginas/vacunas.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $nom ?></title>
</head>
<body>
    <?php include ('../Funciones/cabecera_resto.php') ?>
    <h2><?php echo $nom ?></h2>

    <form action="../Funciones/procesar_vacunacion.php" method="post">
    <input type="hidden" name="id_u" value=<?php echo $_SESSION["id"] ?>> <!-- enviar el id del usuario  -->
    <input type="hidden" name="id_v" value=<?php echo $id ?>> <!-- enviar el id de la vacunacion  -->
    <?php 
    #boton inscribirse si hay cupos y si no esta inscrito
    if(count($filas3)==0){ ?>
    <button type="submit" name="i">Inscribirse</button>
    <?php } ?>
    <?php 
    #boton cancelar si ya esta inscrito
    if(count($filas3)==1){ ?>
    <button type="submit" name="c">Cancelar Inscripción</button>
    <?php } ?>
    <button type="submit" name="b">Regresar a Lista Vacunación</button>
    </form>
    <div>
    <p>Nombre Vacuna:</p>
    <p><?php echo $nom ?></p>
    </div>
    <div>
    <p>Descripción:</p>
    <p><?php echo $filas[0][$desc_vacunas] ?></p>
    </div>
    <div>
    <p>Fecha:</p>
    <p><?php echo $filas[0][$fecha_vacunas] ?></p>
    </div>
    <div>
    <p>Cupos restantes:</p>
    <p><?php echo $disponible ?></p>
    </div>
    <div>
    <p>Lista Inscritos</p>
    <table>
    <tr>
        <td>Nombres</td>
        <td>Apellidos</td>
    </tr>
    <?php
        for ($i=0; $i < count($filas2); $i++) { 
            $u=$filas2[$i][$idUsu_vacuna_usuario];
            $sql4="SELECT $nom_usuario, $ape_usuario FROM $tab_usuario WHERE $id_usuario='$u'";
            $r=$pdo->query($sql4);
            $f=$r->fetch();
            ?>
            <tr>
                <td><?php echo $f[$nom_usuario] ?></td>
                <td><?php echo $f[$ape_usuario] ?></td>                
            </tr>
            <?php
        }
    ?>
    </table>
    </div>

    <?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>