<?php
include "funciones.php";
eliminar_sesiones();

//Si hay un dificultad en el get es que viene de finJuego,y le ha dado al botón Jugar de nuevo. Lo mandamos a jugar:
if($_GET['dificultad']){
    $dif= $_GET['dificultad'];
    Header("Location:jugar.php?dificultad=$dif");
    exit;
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego Master Bind</title>
    <!-- FUENTE PARA EL TÍTULO-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon.ico">
    <!--ICONOS FONT AWESOME-->
    <script src="https://kit.fontawesome.com/b4f679ca0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo_index.css" type="text/css">
    <link rel="stylesheet" href="css/estilo_jugar.css" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-personalizado">
<div id="background_index">
    <div id="presentacion">
        <h2 class="Title">DESCRIPCIÓN DEL JUEGO MASTER MIND</h2>
        <hr/>
        <div class="alert alert-dark" style="margin: 5px;">
            <ol>
                <li>Esta es una presentación personalizada del juego</li>
                <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes</li>
                <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos</li>
                <li>En total el usuario tendrá 14 intentos para adivinar la clave</li>
                <li>En cada jugada la app informará
                    <ul>
                        <li>cuantos colores ha acertado el usuario de la clave.</li>
                        <li>cuantos de estos colores están en la posición correcta.</li>
                    </ul>
                </li>
                <li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
            </ol>
        </div>
        <!--<hr />-->
        <form action="jugar.php" method="post">
            <div class="alert alert-dark" style="margin: 10px;">
                <div class="container-fluid">
                    <h2>Establece la Dificultad del juego</h2>
                    <label> Elige la dificultad del juego, por defecto, es Normal
                        <select name="dificultad" class="form-control-inline form-control-lg">
                            <option value="normal">Normal</option>
                            <option value="dificil">Difícil</option>
                        </select>
                    </label>
                    <ul>
                        <li>Normal: 4 colores para adivinar en 14 jugadas de entre 10 colores.</li>
                        <li>Dificil: Igual que el normal, pero los colores se pueden repetir, es decir, puede llegar a ocurrir que hasta los 4 sean el mismo color.
                        </li>
                    </ul>
                </div>
            </div>
            <input class="Title animated flash" type="submit" value="Inicio">
        </form>
        <a href="https://es.wikipedia.org/wiki/Mastermind" target="_blank">Más información sobre el juego en <i
                    class="fab fa-wikipedia-w"></i></a>
        <div class="audio_index">
            <audio id="player" preload="auto" src="assets/music/Solve The Puzzle.ogg" autoplay loop></audio>
            <div>
                <button onclick="document.getElementById('player').play()"><i class="fas fa-play-circle">Play</i>
                </button>
                <button onclick="document.getElementById('player').pause()"><i class="fas fa-pause-circle">Pause</i>
                </button>
                <button onclick="document.getElementById('player').volume+=0.1"><i class="fas fa-volume-up"> + </i>
                </button>
                <button onclick="document.getElementById('player').volume-=0.1"><i class="fas fa-volume-down"> - </i>
                </button>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small letra_blanca">
        <div class="footer-copyright text-center py-3">
            © 2021 Copyright
            Isabel González Anzano
        </div>
    </footer>

</div>

</div>
<!--LIBRERIAS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>