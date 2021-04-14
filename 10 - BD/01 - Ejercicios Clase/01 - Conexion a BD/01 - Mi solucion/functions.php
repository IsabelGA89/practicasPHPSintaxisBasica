<?php

//DEBUG
function imprime_bonito_post(){
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_POST, true));
        echo '</pre>';
    }
}
function imprime_bonito_files(){
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_FILES, true));
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