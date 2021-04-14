<?php
//Codificación de errores:
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/
function compruebaNumeroArr($array,$valor){
    $posicion = -1;
    for( $contador=0; $contador < count($array); $contador++ )
    {
        if( $array[$contador] == $valor) {
            $posicion = $contador;
            break;
        }
    }
    if( $posicion == -1 )
        echo "No se ha encontrado el valor $valor<br>";
    else
        echo "$valor está en la posición [".$posicion."] <br/>";
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 4</title>
</head>
<header>
    <h1>Ejercicio 4 - Funciones de Arrays</h1>
</header>
<body>
<div class="container">

    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Repite el ejercicio anterior usando funciones para todas las acciones<br/>
        <ul>
            <li>Crea un array de notas de 15 alumnos Inicializadas con 0</li>
            <li>Asiga a cada nota un valor aleatorio entre 5 y 10</li>
            <li>Visualiza el array y verfica sus valores</li>
            <li>Obtener la nota máxima, la mínima y la media del array</li>
        </ul>
        <p>
            Ahora continuamos usando más funciones vistas en la teoría
        <ul>
            <li>Crea otro array de notas de 15 alumnos con notas entre 0 y 5</li>
            <li>Junta los dos array en uno solo</li>
            <li>Vuelve a realizar las acciones anteriores (max, min y media)</li>
            <li>Recorre el array con un foreach</li>
            <li>REaliza el recorrido con las funciones de recorrido especificadas anteriormente, mostrando en cada caso el ínice y valor (next, reset, current, key)</li>
            <li>Busca el primer 10 en el array y devuelve su posición</li>
            <li>Confirma si hay un 11 y un 4 como valores dentro del array</li>
            <li>Ordena el array ascendentemente y muéstralo</li>
            <li>Ordena el array descendentemente y muéstralo</li>
            <li>Elimina valores repetidos y muéstralos</li>

        </ul>
        <div style="background-color: lightpink">
            <?php
            $media=0;
            //generamos un array de notas inicializadas con valores entre 5 y 10:
            echo "<h2>Notas</h2>";
            for ($i=0;$i<15;$i++){
                $notas[$i] = rand(5,10);
                echo "La nota actual es: $notas[$i] <br/>";
                $media +=$notas[$i]/15;
            }
            //var_dump($notas);
            echo "<hr/>";
            echo "<h2>Estadística de las notas</h2>";
            echo "La nota mayor es ".max($notas)."<br/>";
            echo "La nota menor es ".min($notas)."  <br/>";
            echo "La nota media es ".round($media,2)." <br/>";
            echo "<hr/>";
            echo "<hr/>";
            ?>
        </div>
        <div style="background-color: indianred">
            <?php
            $sumatorio=0;
            //generamos un array de notas inicializadas con valores entre 0 y 5:
            echo "<h2>Notas</h2>";
            for ($i=0;$i<15;$i++){
                $notas2[$i] = rand(0,5);
                echo "La nota actual es: $notas2[$i] <br/>";
            }

            //var_dump($notas);
            echo "<hr/>";
            echo "<p>Unimos los dos arrays</p>";
            foreach ($notas2 as $valor) {
                $array_copia[] = $valor;
            }
            foreach ($notas as $valor) {
                $array_copia[] = $valor;
            }
            var_dump($array_copia);
            echo "<hr/>";
            $total_elem = sizeof($array_copia);
            for ($i=0;$i<$total_elem;$i++){
                $sumatorio +=$array_copia[$i];
            }
            $media2 = $sumatorio/count($array_copia);
            echo "<hr/>";
            echo "<h2>Estadística de las notas</h2>";
            echo "La nota mayor es ".max($array_copia)."<br/>";
            echo "La nota menor es ".min($array_copia)."  <br/>";
            echo "La nota media es ".round($media2,2)." <br/>";
            echo "<hr/>";
            echo "Recorremos el array con un foreach:";
            foreach ($array_copia as $valor) {
               echo $valor. " ";
            }
            echo "<hr/>";
            echo "Funciones de recorrido: <br/>";
            reset($array_copia);//Voy al primer elemento
            $n = 0;
            do {
                $indice = key($array_copia); //Obtener el indice actual
                $actual = current($array_copia); //Obtener el valor del elemento actual del array
                echo "El elemento con la  posición <b>$n</b> e indice <b> $indice </b > es <b > $actual</b ><br />";
                $n++;
            }while (next($array_copia)); //Next avanza al siguiente elemento del array, cuando llegue al último dará false
            echo "<hr/>";
            echo "El primer 10 en el array está en la posición:".array_search(10, $array_copia);
            echo "<hr/>";
            echo "Confirma si hay un 11 y un 4 como valores dentro del array <br/>";
            compruebaNumeroArr($array_copia,11);
            compruebaNumeroArr($array_copia,4);
            echo "<hr/>";
            echo "Ordenación Ascendente <br/>";
            sort($array_copia);
            foreach ($array_copia as $valor) {
                echo $valor. " ";
            }
            echo "<br/><hr/>";
            echo "Ordenación Descendente <br/>";
            $arrRev = array_reverse($array_copia);
            foreach ($arrRev as $valor) {
                echo $valor. " ";
            }
            echo "Elimina valores repetidos y muéstralos <br/>";
            $arrNoRepeat = array_values(array_diff_assoc($array_copia, array_unique($array_copia)));
            print_r($arrNoRepeat);
            echo "<hr/>";
            ?>
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

