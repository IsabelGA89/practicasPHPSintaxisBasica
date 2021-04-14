<?php
//Codificación de errores:
ini_set('display_errors',1);
error_reporting(E_ALL);

$img_array=[
    "https://es.wikieducator.org/images/3/3d/Ajax_cliente_servidor.png",
    "https://es.wikieducator.org/images/7/7b/Funcionamiento_ajax.png",
    "https://es.wikieducator.org/images/a/aa/Angular_app_base.png",
    "https://es.wikieducator.org/images/3/3d/Docker_distancia_1.png",
    "https://es.wikieducator.org/images/4/4e/Opcion_Instalar.png",
    "https://es.wikieducator.org/images/a/ab/AplicacionWeb.png",
    "https://es.wikieducator.org/images/e/e4/Red3.png",
    "https://es.wikieducator.org/images/f/f2/DACTW.png",
    "https://es.wikieducator.org/images/e/e5/M3_web.png",
    "https://es.wikieducator.org/images/a/a6/Ficheros.jpeg"];

    $indices = array_rand($img_array, 3);
    $i1 = $indices[0];
    $i2 = $indices[1];
    $i3 = $indices[2];

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport">
    <META HTTP-EQUIV=Refresh CONTENT="5; URL=index.php">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 5</title>
</head>
<header>
    <h1>Ejercicio 5 - Imágenes aleatorias</h1>
</header>
<body>
<div class="container">

    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Crea un array con imagenes aleatorias y luego haz que se carguen cada 5 segundos de forma aleatoria.<br/></p>
        <ul>
            <li>Es muy importante que las 3 imágenes no se puedan repetir, que sean diferentes</li>
        </ul>

        <div style="background-color: lightpink">
            <div style="align-items: center">
            <?php
            /**
             * Debo recoger los índices
             */
            $i1 = $indices[0];
            $i2 = $indices[1];
            $i3 = $indices[2];
            echo "<img width='300' height='300' src='$img_array[$i1]' alt='imagen 1'>";
            echo " ";
            echo "<img width='300' height='300' src='$img_array[$i3]' alt='imagen 2'>";
            echo " ";
            echo "<img width='300' height='300' src='$img_array[$i2]' alt='imagen 3'>";
            ?>
            </div>
        </div>
    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


