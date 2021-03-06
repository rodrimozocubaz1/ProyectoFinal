<?php
include_once ("../Funciones/variables.php");
include_once ("../Funciones/verificar_session.php");

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
if(isset($_GET["v"])){
    $id=$_GET["v"];    
    #info de la vacunacion seleccionada
    $sql="SELECT * FROM $tab_vacunas WHERE $id_vacunas='$id'";

    #ejecutar comando
    $resultado=$pdo->query($sql);
    $filas=$resultado->fetchAll();
    
    #entra al if si escribieron un id de vacunacion en el get q no existe
    if (count($filas)==0) {
        header("Location: ../paginas/vacunacion.php");
        exit();    
    }else{
        $nom=$filas[0][$nom_vacunas];
        
        #revisar que mascotas estan inscritos en la vacunacion seleccionada
        $sql2="SELECT * FROM $tab_vacuna_mascota WHERE $idVac_vacuna_mascota='$id'";
        #ejecutar comando2
        $resultado2=$pdo->query($sql2);
        $filas2=$resultado2->fetchAll();

        #cuantos cupos disponibles quedan
        $disponible=$filas[0][$capacidad_vacunas]-count($filas2);

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
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilonosotros.css">
    <link rel="stylesheet" href="../estilos/estilos_tabla.css">
</head>
<body>
    <?php include ('../Funciones/cabecera_resto.php') ?>
    <div class="contenido_infvacunacion">
        <h2><?php echo $nom ?></h2>

        <form action="../Funciones/procesar_vacunacion.php" method="post">
        <input type="hidden" name="id_u" value=<?php echo $_SESSION["id"] ?>> <!-- enviar el id del usuario  -->
        <input type="hidden" name="id_v" value=<?php echo $id ?>> <!-- enviar el id de la vacunacion  -->
        <button type="submit" name="b">Regresar a Lista Vacunación</button>

        <h3>Lista Mascotas</h3>
        <table>
            <tr>
                <td>Nombre Mascota</td>
                <td>Inscripciones</td>
            </tr>
            
                <?php
                #mostrar lista de mascotas del usuario
                $id_usuario_sesion=$_SESSION["id"];
                $sql3="SELECT * FROM $tab_mascota WHERE $due_mascota='$id_usuario_sesion'";
                
                foreach ($pdo->query($sql3) as $f0) { ?>
                <tr>
                    <td><?php echo $f0[$nom_mascota] ?></td>
                    <td>
                    <?php 
                    $id_m=$f0[$id_mascota];
                    $r0=$pdo->query("SELECT * FROM $tab_vacuna_mascota WHERE $idMas_vacuna_mascota='$id_m' AND $idVac_vacuna_mascota='$id'");
                    $f3=$r0->fetchAll();

                    if(count($f3)==1){ ?>
                        <button type="submit" name="<?php echo $id_m ?>" value="c">Cancelar inscripción</button>
                    <?php
                    }elseif($disponible==0){ ?>
                        No hay cupos disponibles
                    <?php
                    }else{ ?>
                        <button type="submit" name="<?php echo $id_m ?>" value="i">Inscribirse</button>
                    <?php } ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            
        </table>
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
        <h3>Lista Mascotas Inscritas</h3>
        <table>
        <tr>
            <td>Nombre Mascota</td>
            <td>Dueño</td>
        </tr>
        <?php
            for ($i=0; $i < count($filas2); $i++) { 
                $m=$filas2[$i][$idMas_vacuna_mascota];
                $sql4="SELECT * FROM $tab_mascota WHERE $id_mascota='$m'";
                $r=$pdo->query($sql4);
                $f=$r->fetch();
                
                $u=$filas2[$i][$idUsu_vacuna_mascota];
                $sql5="SELECT * FROM $tab_usuario WHERE $id_usuario='$u'";
                $r2=$pdo->query($sql5);
                $f2=$r2->fetch();
                ?>
                <tr>
                    <td><?php echo $f[$nom_mascota] ?></td>
                    <td><?php echo $f2[$ape_usuario] ?>, <?php echo $f2[$nom_usuario] ?></td>                
                </tr>
                <?php
            }
        ?>
        </table>
        </div>
    </div>
    <?php include ('../Funciones/footer_resto.php') ?>
</body>
</html>