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
            <section class="parte_1">
            <div class="ayudamos">
                <div class="img_ayudamos">
                    <img src="Imagenes/perro_ayuda.jpg" alt="" width="100%">
                </div>
                <div class="ayudamos_texto">        
                    <h2>Como ayudamos a las mascotas perdidas</h2>
                    <p>Nos encargamos de buscar un hogar a los animales domésticos que han sido encontrados perdidos o 
                    abandonados, dandoles asi una oportunidad para poder volver a reintegrarse a una familia
                    que pueda darles el amor y cariño que merecen.</p>
                    <p>Adopta, cambia una vida y suma felicidad a la tuya. En TuPET puedes encontrar a tu mascota ideal!</p>
                    <p>El sueño es incrementar el número de adopciones en Lima, a través de un espacio virtual que centralice las oportunidades de adopción, brindando además asesoría integral a los adoptantes y trabajando en coordinación con una red de albergues.  :')</p>
            </section>    
            </div >
                <section class="parte_2">
                    <div class="ayudamos">
                <div class="ayudamos_texto">
                <h3>Que saber antes de adoptar...</h3>
                    <p>Incorporar una mascota en tu vida es un hecho importante que va a modificar tu día a día durante muchos años, por lo es imprescindible que actúes con responsabilidad, y sospeses la idea teniendo muy en cuenta los pros y los contras. Piensa que, la mayoría de las mascotas que son abandonados y acogidos por refugios o protectoras, son fruto de una decisión impulsiva y poco meditada por parte de sus propietarios, que ven alterada su vida cuando ya es demasiado tarde.</p>
                </div>
                <div class="img_ayudamos">
                    <img src="Imagenes/bulldog.jpg" alt="" width="100%">
                </div>
                </div>
            </section>
        </div>
    </main>
    
    <?php include ('Funciones/footer.php');  ?>
    
</body>
</html>