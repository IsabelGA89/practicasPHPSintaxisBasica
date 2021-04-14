<?php
include "funciones.php";

session_start();
/*imprime_sesiones();*/
/*imprime_bonito_post();*/
//Si viene por get es que ha ido de finjuego a index e index nos lo ha redirigido con la anterior dificultad asignada
if (isset($_GET['dificultad'])) {
    $dificultad = $_GET['dificultad'];
}


//Si viene del finJuego vuelve a inicio.
if (isset($_POST['submit']) && $_POST['submit'] == "Volver a Inicio") {
    reset_game();
}
//Si venimos del fin del juego eliminamos todas las variables de sesión y empezamos de 0 - hay que usar un header para que el
//borrado de las variables de sesión tenga efecto:
if (isset($_POST['submit']) && $_POST['submit'] == "Jugar de nuevo") {
    redirigir_index();
}

/*Declaro las variables*/
if (isset($_POST['dificultad'])) {
    $dificultad = $_POST['dificultad'] ?? "normal";
}

$array_colores = ["Azul", "Rojo", "Amarillo", "Verde", "Rosa", "Blanco", "Negro", "Morado", "Marron", "Naranja"];
$jugada_actual = $_SESSION['num_jugada'] ?? 0;
$colores_coinciden = $_SESSION['jugada'][$jugada_actual]['aciertos']['colores'] ?? 0;
$posiciones_coinciden = $_SESSION['jugada'][$jugada_actual]['aciertos']['posiciones'] ?? 0;
$msj = "";


//Al inicio comprobamos si hay clave, y sino la creamos y la guardamos en una variable de sesión:
if (!isset($_SESSION['clave'])) {
    $array_claves = generar_clave($array_colores, 4, $dificultad);
} else {
    $array_claves = $_SESSION['clave'];
}
//Botón Mostrar clave
if (isset($_POST['mostrar_clave']) && $_POST['mostrar_clave'] == "Mostrar Clave") {
    $opcion_clave = "Ocultar Clave";
} else {
    $opcion_clave = "Mostrar Clave";
}

//Opción Jugar:
if (isset($_POST['submit']) && $_POST['submit'] === "Jugar") {
    //Función para comprobar que los 4 selects tienen un valor
    $mensaje_error = comprobar_seleccion_completa();
    if ($mensaje_error != "") {
        $msj = $mensaje_error;
    }else{
        $jugada_actual = actualizar_jugada($jugada_actual);
        $array_jugada_actual = leer_jugada();
        //Guardamos la jugada con el número de jugada en la sesión
        $_SESSION['jugada'][$jugada_actual] = $array_jugada_actual;
        $comparacion = comparar_jugada($array_jugada_actual, $array_claves, $jugada_actual);
        $colores_coinciden = actualizar_colores($comparacion, $jugada_actual);
        $posiciones_coinciden = actualizar_posiciones($comparacion, $jugada_actual);
        comprobar_fin_juego($jugada_actual);
    }

}

if (isset($_POST['submit']) && $_POST['submit'] === "Inicio") {
    reset_game();
}
if (isset($_POST['submit']) && $_POST['submit'] === "Resetear Clave") {
    redirigir_index();
}


?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo_jugar.css">
    <!-- FUENTE PARA EL TÍTULO-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
    <!--ICONOS FONT AWESOME-->
    <script src="https://kit.fontawesome.com/b4f679ca0a.js" crossorigin="anonymous"></script>
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Isa´s MasterMind</title>
</head>
<!--<header>
    <div class="container linea_titulo"><h1 class="Title">Master Mind</h1></div>
</header>-->
<body>
<script src="js/functions.js"></script>
<div id="background">
    <div class="container linea_titulo">
        <h1 class="Title">Master Mind <p>Modo:<?= $_SESSION['dificultad'] ?></p></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <!--Formulario OPCIONES DE JUEGO-->
                        <div class="jumbotron" id="opciones">
                            <h4><i class="fas fa-directions"></i> Opciones de Juego</h4>
                            <form action="jugar.php" method="POST">
                                <div id="botones_opciones" class="jumbotron">
                                    <input type="submit" name="mostrar_clave" class="btn btn-info btn-lg"
                                           value="<?php echo $opcion_clave ?>"/>
                                    <input type="submit" name="submit" class="btn btn-secondary btn-lg" value="Inicio"/>
                                    <input type="submit" name="submit" class="btn btn-danger btn-lg"
                                           value="Resetear Clave"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--FORMULARIO MENU DE JUEGO-->
                        <div class="jumbotron" id="menu">
                            <h4><i class="fas fa-gamepad"></i> Menú Juego</h4>
                            <div id="botones_menu_juego" class="jumbotron">
                                <?php
                                $colores_jugada_previa = colores_ultima_jugada($jugada_actual);
                                render_botones_colores($array_colores, 4, $colores_jugada_previa,$msj);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- FORMULARIO INFORMACION DE JUGADAS-->
                        <div class="jumbotron" id="informacion">
                            <h4><i class="fas fa-info-circle"></i> Información de Jugadas</h4>
                            <!--  <h5>Sección de información</h5>-->
                            <div id="texto-jugada">
                                <?php
                                if($jugada_actual !=0){
                                 echo  "<h3 for='jugada'>Jugada actual: $jugada_actual </h3>";
                                 echo '<label for="rdo"><h5>Resultado: Colores <span
                                                class="blanco">'.$colores_coinciden .'</span>y Posiciones <span
                                                class="negro">'.$posiciones_coinciden .'</span></h5></label>';
                                }else{
                                    echo  "<h3>Sin datos que mostrar, por favor realiza una jugada para comenzar <i class='fas fa-dice'></i></h3>";
                                }
                                ?>
                            </div>
                            <!-- <hr/>-->
                            <?php
                            if ($opcion_clave == "Ocultar Clave") {
                                render_clave($array_claves);
                            }
                            if (isset($_SESSION['jugada'])) {
                                render_historico_jugadas();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<footer class="page-footer font-small" style="background-color: white">
    <div class="footer-copyright text-center py-3">
        © 2021 Copyright
        Isabel González Anzano
    </div>
</footer>
</html>
