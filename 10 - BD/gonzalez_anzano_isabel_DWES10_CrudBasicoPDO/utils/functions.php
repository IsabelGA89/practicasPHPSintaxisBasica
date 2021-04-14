<?php


//ERRORES de PHP
function ver_errores()
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
//DEBUG
function imprime_bonito_post(){
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_POST, true));
        echo '</pre>';
    }
}
function imprime_bonito_get(){
    if ($_GET) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_GET, true));
        echo '</pre>';
    }
}
function imprime_bonito_request(){
    if ($_REQUEST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_REQUEST, true));
        echo '</pre>';
    }
}
function imprime_directorio($direccion){
    $dir = scandir($direccion);
    return $dir;
}
function imprime_sesiones()
{
    if (isset($_SESSION)) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_SESSION, true));
        echo '</pre>';
    }
}
function imprime_bonito_array($arr)
{
    echo '<pre>';
    echo htmlspecialchars(print_r($arr, true));
    echo '</pre>';
}

//Sesiones
function eliminar_sesion()
{
    session_destroy();
    session_start();
}

//Render
function pintar_tabla_bds($datos_conexion){
    //Crear la conexion
    $driver_conexion = new BD($datos_conexion);
    //Obtenemos la plantilla con los datos
    //Obtenemos las bases de datos de la conexión
    $listado_bds = $driver_conexion->print_data_bases();
    //Cerramos la conexion
    $driver_conexion->cerrar();
    return $listado_bds;
}

function refresh_data_table($datos,$tabla){
    $arr_resultado =[];
    //Conexion
    $db = new BD($datos);
//Obtengo datos para rellenar la tabla:
    $nombres_columnas = $db->campos($tabla);
    $contenido_columnas = $db->contenido($tabla);
    /*imprime_bonito_array($contenido_columnas);*/

    $tabla_html = $db->print_datos($tabla,$nombres_columnas,$contenido_columnas);

    //Mensajes
    if($tabla_html != ""){
        $msj_info= $db->get_info_message();
    }else{
        $msj_error = $db->get_error_message();
    }
    $arr_resultado[0] = $tabla_html;
    $arr_resultado[1] = $msj_info;
    $arr_resultado[2] = $msj_error;

    $db->cerrar();

    return $arr_resultado;
}

function pintar_error($msj_error){
    if($msj_error != ""){
        echo  '<div id="error" class="alert alert-danger" role="alert" >';
        if($msj_error != ""){echo $msj_error;}
        echo '</div>';
    }

}
function pintar_info($msj_info){
    if($msj_info != ""){
        echo  '<div id="info" class="alert alert-info" role="alert" >';
        if($msj_info != ""){echo $msj_info;}
        echo '</div>';
    }

}
