<?php 
include ('Funciones/variables.php'); 
include ('Funciones/verificar_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TuPET</title>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloprincipal.css">
</head>
<body>
    
    <?php include ('Funciones/cabecera.php'); ?>   

    <main class="main-contenedor">
        <div class="ayudamos">
            <div class="img_ayudamos">
                <img src="Imagenes/perro_ayuda.jpg" alt="" width="100%">
            </div>
            <div class="ayudamos_texto">        
                <h2>Como ayudamos a las mascotas perdidas</h2>
                <p>Nos encargamos de buscar un hogar a los animales domésticos que han sido encontrados perdidos o 
                abandonados, dandoles asi una oportunidad para poder volver a reintegrarse a una familia
                que pueda darles el amor y cariño que merecen.</p>
            </div>
        </div>
    </main>
    
    <?php include ('Funciones/footer.php');  ?>
    
</body>
</html>