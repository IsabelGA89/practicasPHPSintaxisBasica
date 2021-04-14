<?php
//Codificación de errores:
ini_set('display_errors',1);
error_reporting(E_ALL);

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <title>Ejercicio 2</title>
</head>
<header>
    <h1>Ejercicio 2 - Manipulando arrays</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p><strong>Asignando y elmininando valores</strong></p>
        <ul>
            <li>Creamos un array asingnándole 5 valores de forma indexada</li>
            <li>Asinga valores entero, cadenas, y la quinta posición que sea otro array de tres elementos</li>
            <li>Lo visualizamos con un var_dump</li>
            <li>Agregamos valores en posiciones 15 y 30</li>
            <li>Lo visualizamos con un var_dump</li>
            <li>Eliminamos los índices vacíos de forma que quede compacto (sin usar funciones)</li>
            <ul>
                <li>Es decir las desaparecen las posiciones 15 y 30</li>
                <li>Sus valores se mantienen en las posicones 5 y 6</li>
            </ul>
        </ul>
    </div>
    <h1>Respuesta</h1>
    <div class="jumbotron">
        <div style="background-color: lightpink">

        <?php
        $arr = [0,"cadena",258,"cadena en posicion 3",[1,2,3]];
        echo var_dump($arr);
        echo "<hr/>";
        echo "agregamos valores en las posiciones 15 y 30.<br/>";
        $arr[15] = "añadido a posición 15";
        $arr[30] = "añadido a posición 30";
        echo "<br/>";
        var_dump($arr);
        echo "<hr/>";
        echo "Eliminamos los índices vacíos de forma que quede compacto (sin usar funciones).<br/>";
        foreach ($arr as $valor) {
            $array_copia[] = $valor;
        }
        //Copio y visualizo el array
        $arr = $array_copia;
        echo "<br/>";
        var_dump($arr);
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
</html>
