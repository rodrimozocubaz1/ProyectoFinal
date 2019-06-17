<header class="site-header inicio">    
    <div class='contenedor contenido-header' id="myHeader">
        <div class="barra">
            <a href="../index.php"><img src="../Imagenes/TuPET.jpg" alt="Logo" width="150px" class="logo"></a>
            <nav class="navegacion">                                   
                <a href="../paginas/reportar_mascota.php" class="a">Reportar</a>
                <a href="../paginas/adopcion.php" class="a">Adopcion</a>
                <a href="../paginas/talleres.php" class="a">Talleres</a>
                <a href="../paginas/vacunacion.php" class="a">Vacunación</a>
                <a href="../paginas/contactar.php" class="a">Contactanos</a>
                <a href="../paginas/quienes_somos.php" class="a">Nosotros</a>
                <?php if(isset($_SESSION["id"])){ ?>
                <a href="../paginas/usuario.php" class="a"><?php echo $_SESSION["usuario"] ?></a>
                <a href="../Funciones/cerrar_session.php" class="a">Cerrar Sesión</a>
                <?php }else{ ?>
                <a href="../paginas/login.php" class="a">Iniciar Sesion</a>
                <a href="../paginas/registrarse.php" class="a">Registrarse</a>
                <?php } ?>
                                
            </nav>   
        </div>         
    </div>       
</header>