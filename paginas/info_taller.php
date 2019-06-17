<?php
include_once ("../Funciones/variables.php");
include_once ("../Funciones/verificar_session.php");

if(!isset($_SESSION["id"])){
    header("Location: ../paginas/login.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
if(isset($_GET["t"])){
    $id=$_GET["t"];    
    #info del taller seleccionado
    $sql="SELECT * FROM $tab_talleres WHERE $id_taller='$id'";

    #ejecutar comando
    $resultado=$pdo->query($sql);
    $filas=$resultado->fetchAll();
    
    #entra al if si escribieron un id de taller q no existe
    if (count($filas)==0) {
        header("Location: ../paginas/talleres.php");
        exit();    
    }else{
        $nom=$filas[0][$nom_taller];
        
        #revisar que usuarios estan inscritos al taller
        $sql2="SELECT * FROM $tab_taller_usuario WHERE $idTal_taller_usuario='$id'";
        #ejecutar comando2
        $resultado2=$pdo->query($sql2);
        $filas2=$resultado2->fetchAll();

        #cuantos cupos disponibles quedan
        $disponible=$filas[0][$capacidad_taller]-count($filas2);

        #verificar si el usuario ya esta inscrito en el taller
        $id_usuario_sesion=$_SESSION["id"];
        $sql3="SELECT * FROM $tab_taller_usuario WHERE $idTal_taller_usuario='$id' AND $idUsu_taller_usuario='$id_usuario_sesion'";
        #ejecutar comando3
        $resultado3=$pdo->query($sql3);
        $filas3=$resultado3->fetchAll();
    }
}else{
    header("Location: ../paginas/talleres.php");
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

    <form action="../Funciones/procesar_talleres.php" method="post">
    <input type="hidden" name="id_u" value=<?php echo $_SESSION["id"] ?>> <!-- enviar el id del usuario  -->
    <input type="hidden" name="id_t" value=<?php echo $id ?>> <!-- enviar el id del taller  -->
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
    <button type="submit" name="b">Regresar a Lista Talleres</button>
    </form>
    <div>
    <p>Nombre Taller:</p>
    <p><?php echo $nom ?></p>
    </div>
    <div>
    <p>Descripción:</p>
    <p><?php echo $filas[0][$desc_taller] ?></p>
    </div>
    <div>
    <p>Fecha:</p>
    <p><?php echo $filas[0][$fecha_taller] ?></p>
    </div>
    <div>
    <p>Hora:</p>
    <p><?php echo $filas[0][$hora_taller] ?></p>
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
            $u=$filas2[$i][$idUsu_taller_usuario];
            $sql4="SELECT * FROM $tab_usuario WHERE $id_usuario='$u'";
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