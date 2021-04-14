<?php

// ** Ficheros
//funcion que crea una carpeta en la ruta indicada y con el nombre que se indica y devuelve la ruta a la carpeta
function crear_carpeta($url,$name){
    $micarpeta = $url.DIRECTORY_SEPARATOR.$name;
    if (!file_exists($micarpeta)) {
        mkdir($micarpeta, 0777, true);
    }
    return $micarpeta;
}
function imprime_directorio($direccion){
    return  scandir ($direccion);
}
//Devuelve un array con los ficheros de un directorio
function obtener_ficheros($direccion){
    $ficheros = imprime_directorio($direccion);
    $arr_ficheros = [];
    foreach ($ficheros as $fichero){
        if(!is_dir($fichero)){
            array_push($arr_ficheros,$fichero);
        }
    }
    return $arr_ficheros;
}

// **  Funciones para debug.
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
function imprime_bonito_array($arr){
    echo '<pre>';
    echo htmlspecialchars(print_r($arr, true));
    echo '</pre>';
}

// ** Funciones para locales- Idiomas
function comprobar_gettext(){
    if (!function_exists("gettext")) {
       /* echo "gettext is not installed\n";*/
        return false;
    }else{
       /* echo "gettext is supported\n";*/
        return true;
    }
}
function get_idioma($idioma){
    switch ($idioma) {
        case "frances" :
            $lang = "fr_FR.utf8";
            break;
        case "ingles" :
            $lang = "en_US.utf8";
            break;
        case "castellano":
            $lang = "es_ES.utf8";
            break;
    }
    return $lang;
}
function asigna_idioma($lang){
    $msj = "";
    $isGetText = comprobar_gettext();

    $idioma = get_idioma($lang);
   /* $idioma = "en_US.utf8";*/
    if($isGetText==true){
    if (!putenv("LC_ALL=$idioma")){
        $msj="No se ha podido establecer el idioma $idioma en variables de entorno<br />";
    }
    if (setlocale(LC_ALL, $idioma)==""){
        $msj.="No se ha podido cargar el idioma $idioma como categoria LC_ALL";
    }
    setlocale (LC_ALL, 0). "<br/>";
    $dominio = "messages";
    bindtextdomain($dominio, "./locale") . "<br/>";
    if($msj != ""){
        return $msj;
    }
    }else{
        $msj =" No está instalada la librería gettext";
        return $msj;
    }
}


