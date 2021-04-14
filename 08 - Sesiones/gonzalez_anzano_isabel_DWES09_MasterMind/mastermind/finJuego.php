<?php
require_once("funciones.php");
session_start();
/*imprime_sesiones();*/

$clave = $_SESSION['clave'];
//Si posicion = 4, ha acertado:
$posicion = $_GET['posicion'];

$jugadas = $_SESSION['num_jugada'] + 1;
$jugada = $_SESSION['jugada'];

$dificultad = $_SESSION['dificultad'];

$mensaje_resultado = render_resultado($posicion,$jugadas);

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo_jugar.css" type="text/css">
    <link rel="stylesheet" href="css/estilo_finJuego.css" type="text/css">
    <!-- FUENTE PARA EL TÍTULO-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
    <!--ICONOS FONT AWESOME-->
    <script src="https://kit.fontawesome.com/b4f679ca0a.js" crossorigin="anonymous"></script>
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Isa´s MasterMind</title>
</head>
<body>
<div id="background_fin">
    <div class="container linea_titulo">
        <h1 class="Title">Fin del Juego <p>Modo: <?= $dificultad ?></p></h1>
    </div>
    <div class="letra_blanca" id="resultado"><?=$mensaje_resultado ?></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 jumbotron" id="historico_jugadas">
                <?php render_historico_jugadas(); ?>
            </div>
            <div class="col-md-6 jumbotron" id="clave_opciones">
                <?php render_clave($clave); ?>
                <div class="jumbotron"> <?php render_botones_fin_juego();?></div>
            </div>
        </div>
    </div>

</div> <!--background-->
</body>
<footer class="page-footer font-small letra_blanca">
    <div class="footer-copyright text-center py-3">
        © 2021 Copyright
        Isabel González Anzano
    </div>
</footer>
</html>