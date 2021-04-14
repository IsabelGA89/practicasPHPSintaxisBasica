<?php

//lee linea a línea un archivo pasado por parámetro:
function leer_fgets($source_path){
    $gestor = @fopen($source_path, "r");
    if ($gestor) {
        while (($búfer = fgets($gestor, 4096)) !== false) {
            echo $búfer;
        }
        if (!feof($gestor)) {
            echo "Error: fallo inesperado de fgets()\n";
        }
        fclose($gestor);
    }
}
//leer linea a línea - DEPRECATED no lee html ni php
function leer_fgetss($source_path){
    $gestor = @fopen($source_path, "r");
    if ($gestor) {
        while (!feof($gestor)) {
            $buffer = fgetss($gestor, 4096);
            echo $buffer;
        }
        fclose($gestor);
    }
}
//leer un fichero en modo binario seguro
function leer_fread($source_path){
    $nombre_fichero = $source_path;
    $gestor = fopen($nombre_fichero, "r");
    $contenido = fread($gestor, filesize($nombre_fichero));
    fclose($gestor);
    echo $contenido;
}
//transfiere fichero a array
function leer_file($source_path){
    // Escribir un fichero en un array.
    $arr_lineas = file($source_path);
    // Recorrer nuestro array, mostrar el código fuente HTML como tal y mostrar tambíen los números de línea.
    foreach ($arr_lineas as $num_línea => $línea) {
        echo "Línea #<b>{$num_línea}</b> : " . htmlspecialchars($línea) . "<br />\n";
    }
}
//transmite un fichero completo a una cadena
function leer_file_get_contents($source_path){
    $página_inicio = file_get_contents($source_path);
    echo $página_inicio;
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Título</title>
</head>
<header>
    <h1>Ejercicio 3.2 - Leer archivo usando funciones</h1>
</header>
<body>
<div class="container">
    <h1>Leer el contenido de un fichero</h1>
    <div class="jumbotron">
        <p>Partiendo de que tenemos un fichero llamado nombres.txt en el directorio actual </p>
            <p>Lee su contenido usando las siguientes funciones</p>
                <ul>
                    <li>fgets</li>
                    <li>fgetss</li>
                    <li>fread</li>
                    <li>file</li>
                    <li>file_get_content()</li>
                </ul>
            <p>Recurda abir y cerrar el fichero o bien reubicarte con la función fseek</p>
            <p>Funciones de ayuda</p>
                <ul>
                    <li>filesize($nombre_fichero) retorna el tamaño en bytes del fichero</li>
                    <li>fseek ( resource $file,  int $offset) pone la cabeza de leer/escribir en el fichero en la posición especificada: 0 al principio del fichero)</li>
                    <li>Las funciones que trabajan con el puntero retornan nul si ya he llegado al final del fichero</li>
                </ul>
        <div style="background-color: lightpink">
            <div>
                <p>Leyendo con la función <strong>fgets() línea a línea</strong></p>
                <p>Respeta HTML y PHP</p>
                <div class="card">
                    <div class="card-body">
                        <?php leer_fgets("nombres.txt");?>
                    </div>
                </div>
            </div>
            <div>
                <p>Leyendo con la función <strong>fgetss() línea a línea</strong></p>
                <p style="color: darkred">DEPRECATED - elimina bytes Null, etiquetas HTML y PHP del texto que lee</p>
                <div class="card">
                    <div class="card-body">
                        <?php leer_fgetss("nombres.txt");?>
                    </div>
                </div>
            </div>
            <div>
                <p>Leyendo con la función <strong>fread() en modo binario seguro</strong></p>
                <div class="card">
                    <div class="card-body">
                        <?php leer_fread("nombres.txt");?>
                    </div>
                </div>
            </div>
            <div>
                <p>Leyendo con la función <strong>file()</strong></p>
                <p>Transfiere un fichero completo a un array</p>
                <div class="card">
                    <div class="card-body">
                        <?php leer_file("nombres.txt");?>
                    </div>
                </div>
            </div>
            <div>
                <p>Leyendo con la función <strong>file_get_contents()</strong></p>
                <p>Transmite un fichero completo a una cadena</p>
                <div class="card">
                    <div class="card-body">
                        <?php leer_file_get_contents("nombres.txt");?>
                    </div>
                </div>
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
    <div class="footer-copyright text-center py-3">© 2020 Copyright
        Isabel González Anzano
    </div>
</footer>
<!-- Footer -->
