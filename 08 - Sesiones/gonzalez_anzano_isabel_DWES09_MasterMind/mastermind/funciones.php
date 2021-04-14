<?php

function render_bolitas_negra_blanca($colores,$posiciones){

    $html = "";
    $html .= "<div>";
    if($posiciones == $colores){
        for($i=0;$i <= $posiciones;$i++){
            $html .= '<span class = "negro"> '.$i.'</span>';
        }
    }
    if($colores > $posiciones){
        $restantes = $colores - $posiciones;
        for($i=0;$i < $posiciones;$i++){
            $html .= '<span class = "negro">'.$i.'</span>';
        }
        for($i=0;$i < $restantes;$i++){
            $html .= '<span class = "blanco">'.$i.' </span>';
        }
    }


    $html .= "</div>";

    return $html;
}

//Genera la clave de $num_colores colores y la guarda como una variable de sesión, return $arr_clave
function generar_clave($arr_colores, $num_colores, $dificultad)
{
    $array_clave = [];

    if ($dificultad == "dificil") {
        //Los colores se pueden repetir
        for ($i = 0; $i < $num_colores; $i++) {
            $color = array_rand($arr_colores);
            array_push($array_clave, $arr_colores[$color]);
        }
    } else {
        //Los colores no se repiten
        $posiciones = array_rand($arr_colores, $num_colores);
        foreach ($posiciones as $item) {
            array_push($array_clave, $arr_colores[$item]);
        }
    }

    //Guardamos la clave en la variable de sesión y la dificultad
    $_SESSION['clave'] = $array_clave;
    $_SESSION['dificultad'] = $dificultad;

    return $array_clave;
}

//lee los selects y los guarda como un array, lo guarda en sesión, sino devuelve array de error.
function leer_jugada()
{
    if (isset($_POST['submit']) == "Jugar") {
        $arr_jugada = [];
        for ($i = 0; $i < 4; $i++) {
            if (isset($_POST[$i])) {
                array_push($arr_jugada, $_POST[$i]);
            }
        }
        return $arr_jugada;
    } else {
        $arr_error = ['error']["No ha sido posible leer la jugada"];
        return $arr_error;
    }
}

function actualizar_jugada($jugada_actual)
{
    $_SESSION['num_jugada'] = ++$jugada_actual;
    return $jugada_actual;
}
//Cuenta cuantos elementos del select se han rellenado y devuelve "" o un mensaje de error.
function comprobar_seleccion_completa(){
    $arr_claves = ["0","1","2","3"];
    $mensaje = "";
    $contador= 0;
    foreach ($arr_claves as $clave){
       if(array_key_exists($clave,$_POST) == 1){
        $contador++;
       }
    }
    if($contador < 4){
        if($contador == 0){
            $mensaje = "Debes seleccionar 4 colores para jugar, y no has seleccionado ninguno";
        }else{
            $mensaje = "Debes seleccionar 4 colores para jugar, sólo has seleccionado $contador";
        }
    }else{
        $mensaje = "";
    }
    return $mensaje;
}

function actualizar_colores($arr_aciertos, $jugada_actual)
{
    $_SESSION['jugada'][$jugada_actual]['aciertos']['colores'] = $arr_aciertos['colores'];
    return $arr_aciertos['colores'];
}

function actualizar_posiciones($arr_aciertos, $jugada_actual)
{
    $_SESSION['jugada'][$jugada_actual]['aciertos']['posiciones'] = $arr_aciertos['posiciones'];
    return $arr_aciertos['posiciones'];
}

function comparar_colores($arr_jugada, $arr_clave)
{
    //Buscamos coincidencia de colores:
    $coincidencias = array_intersect($arr_jugada, $arr_clave);
    $arr_coincidencias = array_count_values($coincidencias);
    return sizeof($arr_coincidencias);
}

function comparar_posiciones($arr_jugada, $arr_clave)
{
    //Buscamos coincidencia de posiciones
    $coincidencias_extrictas = array_intersect_assoc($arr_jugada, $arr_clave);
    $posiciones_acertadas = 0;
    foreach ($coincidencias_extrictas as $value) {
        if ($value) {
            $posiciones_acertadas++;
        }
    }
    return $posiciones_acertadas;
}

function comparar_jugada($arr_jugada, $arr_clave, $jugada_actual)
{
    $colores_acertados = comparar_colores($arr_jugada, $arr_clave);
    $posiciones_acertadas = comparar_posiciones($arr_jugada, $arr_clave);
    $array_colores_posiciones['colores'] = $colores_acertados;
    $array_colores_posiciones['posiciones'] = $posiciones_acertadas;
    //Guardamos la información en la sesión:
    $_SESSION['jugada'][$jugada_actual]['aciertos'] = $array_colores_posiciones;
    return $array_colores_posiciones;
}

function comprobar_fin_juego($jugada_actual)
{
    $posicion = $_SESSION['jugada'][$jugada_actual]['aciertos']['posiciones'];
    if (($jugada_actual === 14) || ($posicion === 4)) {
        header("Location:finJuego.php?posicion=$posicion");
        exit();
    }
}

//Fin del juego
function redirigir_index()
{
    $dificultad = $_SESSION['dificultad'];
    session_destroy();
    /* header("Location:index.php");*/
    header("Location:index.php?dificultad=$dificultad");
    exit();
}

function render_resultado($posicion, $jugadas)
{
    //Si ha ganado porque ha acertado:
    if ($posicion == 4) {
        $msj = "<img src='assets/images/win.gif'>";
        if ($jugadas - 1 > 1) {
            $msj .= "<h1 class='Title'>FELICIDADES ADIVINASTE LA CLAVE EN " . ($jugadas - 1) . " JUGADAS<h1>";
            if($_SESSION['dificultad'] == "normal"){
                $msj .= "<h2 class='Title'>Si el juego te ha parecido muy fácil puedes probar a subir la dificultad.<h2>";
            }else{
                $msj .= "<h2 class='Title'>¡Has superado el reto!<h2>";
            }
        } else {
            $msj .= "<h1 class='Title'>FELICIDADES ADIVINASTE LA CLAVE EN " . ($jugadas - 1) . " JUGADA<h1>";
            $msj .= "<h2 class='Title'>Impresionante...¿Seguro que has jugado limpio?<h2>";
        }
    } else {
        //Ha fallado tras 15 intentos
        $msj = "<img src='assets/images/game_over.gif'>";
        $msj .= "<br/>";
        $msj .= "<h1 class='Title'>DEMASIADOS INTENTOS.... PRUEBA DE NUEVO<h1>";
        if($_SESSION['dificultad'] == "dificil"){
            $msj .= "<h2 class='Title'>Si te resulta muy complicado puedes reducir la dificultad<h2>";
        }else{
            $msj .= "<h2 class='Title'>¿No vas a dejar que te gane un juego verdad?<h2>";
        }

    }
    return $msj;
}

//elimina las sesiones y devuelve al index
function reset_game()
{
    session_destroy();
    header("Location:index.php");
    exit();
}

function eliminar_sesiones()
{
    if (isset($_SESSION['clave'])) {
        session_destroy();
    } else {
        session_start();
    }
}

//Devuelve en un array los colores de la última jugada
function colores_ultima_jugada($jugada_actual)
{
    $jugada_previa = $_SESSION['jugada'][$jugada_actual];
    $arr_colores_previos = [];
    if ($jugada_previa != null) {
        foreach ($jugada_previa as $color) {
            if (!is_array($color)) {
                array_push($arr_colores_previos, $color);
            }
        }
        return $arr_colores_previos;
    } else {
        return null;
    }
}

//Render functions
function render_botones_colores($arr_colores, $num_botones, $colores_jugada_previa,$error = null)
{
    if($colores_jugada_previa == null){
        echo "<h5>Selecciona 4 colores para jugar</h5>";
    }else{
        echo "<h5>Jugada realizada, vuelve a seleccionar para jugar</h5>";
    }

    $icon_error = "<i class='fas fa-bomb'></i>";
    if($error != null){
        echo "<div class='error'>$icon_error $error</div>";
    }
    echo '<form action="jugar.php" method="post">';
    echo '<div class="form-group-inline form-control-lg" id="selects_colores">';

    $jugada_anterior = $colores_jugada_previa;

    if ($jugada_anterior == null) {
        for ($i = 0; $i < $num_botones; $i++) {
            echo '<select class="form-control-inline" id="' . $i . '" name="' . $i . '" onchange = cambia_color(' . $i . ')>';
            echo '<option selected value="0" disabled>Color</option>';
            foreach ($arr_colores as $color) {
                echo '<option class="' . $color . '" value="' . $color . '">' . $color . '</option>';
            }
            echo '</select>';
        }
    } else {
        //Lógica para que las elecciones anteriores se mantengan:
        for ($i = 0; $i < $num_botones; $i++) {
            $color_class = $jugada_anterior[$i];
            echo '<select class="form-control-inline  '.$color_class.'" id="' . $i . '" name="' . $i . '" onchange = cambia_color(' . $i . ')>';
            echo '<option value="0" disabled>Color</option>';

            foreach ($arr_colores as $color) {
                if($color == $jugada_anterior[$i] ){
                    echo '<option selected class="' . $color . '" value="' . $color . '">' . $color . '</option>';
                }else{
                    echo '<option class="' . $color . '" value="' . $color . '">' . $color . '</option>';
                }
            }

            echo '</select>';
        }

    }
    echo "<div id='boton_jugar'>";
    echo '<input type="submit" name="submit" class="btn btn-dark btn-lg form-control" value="Jugar">';
    echo "</div>";
    echo '</div>';
    echo '</form>';
}

//Imprime en varios badges el color y la posicion de los colores de la clave
function render_clave($arr_clave)
{
    /*    echo "<hr/>";*/
    echo '<div class="container caja_clave">';
    echo '<h4>Clave Actual</h4>';
    foreach ($arr_clave as $pos => $color) {
        echo '<div class="badge pildora ' . $color . '"><h3><span class="badge bg-warning ms-2">' . ($pos + 1) . '</span> ' . $color . '</h3></div>';
    }
    echo "<div/>";
}

function render_historico_jugadas()
{
    $num_jugada_actual = $_SESSION['num_jugada'];
    $dificultad = $_SESSION['dificultad'];


    if ($num_jugada_actual != 0) {
        $historico = $_SESSION['jugada'];
        $historico_jugadas = array_reverse($historico);

        echo "<div class='container jumbotron historico'>";
        echo "<h4>Histórico de Jugadas</h4>";
        foreach ($historico_jugadas as $num_jugada => $resultado) {
            echo "<hr/>";
            echo "<br/><h3> Jugada " . ($num_jugada_actual - $num_jugada) . "</h3>";
            foreach ($resultado as $pos => $color) {
                if (!is_array($color)) {
                    echo '<div class="badge pildora ' . $color . '"><h3>' . $color . '</h3></div>';
                } else {
                    if($dificultad == "dificil"){
                        echo '<div> Colores: <span class = "blanco">' . $color['colores'] . '</span>
                    Posiciones: <span class = "negro">' . $color['posiciones'] . '</span></div>';
                    }else{
                        echo render_bolitas_negra_blanca($color['colores'],$color['posiciones']);
                    }
                   /* echo '<div> Colores: <span class = "blanco">' . $color['colores'] . '</span>
                    Posiciones: <span class = "negro">' . $color['posiciones'] . '</span></div>';*/
                }
            }
        }
        echo "</div>";
    } else {
        echo "<div class='container jumbotron historico'>";
        echo "<h4>Histórico de Jugadas</h4>";
        echo "<div>Todavía no se ha realizado ninguna jugada</div>";
        echo "</div>";
    }
}

function render_botones_fin_juego()
{
    /*$coin = '<i class="fas fa-coin"></i>';*/

    echo '<div class="form-group-inline form-control-lg">';
    echo '<h4 >Opciones fin de juego</h4>';
    echo '<form action="jugar.php" method="POST">';
    echo '<input type="submit" style="margin: 10px;" name="submit" class="btn btn-danger btn-lg" value="Jugar de nuevo"/>';
    echo '<input type="submit" style="margin: 10px;" name="submit" class="btn btn-info btn-lg" value="Volver a Inicio"/>';
    echo '</form>';
    echo '</div>';

}

//Debug functions
function mostrar_warnings()
{
    ini_set("display_errors", true);
    error_reporting(E_ALL);
}

function imprime_sesiones()
{
    if (isset($_SESSION)) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_SESSION, true));
        echo '</pre>';
    }
}

function imprime_bonito_post()
{
    if (isset($_POST)) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_POST, true));
        echo '</pre>';
    }
}

function imprime_bonito_files()
{
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_FILES, true));
        echo '</pre>';
    }
}

function imprime_bonito_array($arr)
{
    echo '<pre>';
    echo htmlspecialchars(print_r($arr, true));
    echo '</pre>';
}


//Funciones para ampliaciones - elegir paletas de colores, que los colores sean aleatorios...etc
function color_aleatorio()
{
    //Colores pastel
    $r = mt_rand(128, 255);
    $g = mt_rand(128, 255);
    $b = mt_rand(128, 255);
    //Opacidad
    $a = '0.2';
    $bgcolor = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $a . ')';
    return $bgcolor;
}

function rellenar_arry_colores_aleatorios($num_colores)
{
    $arr_colores = [];
    for ($i = 0; $i <= $num_colores; $i++) {
        $color = color_aleatorio();
        array_push($arr_colores, $color);
    }
    return $arr_colores;
}

?>
