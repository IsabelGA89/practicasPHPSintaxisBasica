<?php
//Codificación de errores:
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 3</title>
</head>
<header>
    <h1>Ejercicio 3 - Array de Notas</h1>
</header>
<body>
<div class="container">

    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Crea un array con 10 notas aleatorias y posteriormente las visualizas obteniendo los valores estadísticos de la
            media, máxima y mínima<br/>
        <ul><li>Hazlo de forma algorítmica, sin usar funciones de arrays</li></ul>
        <div style="background-color: lightpink">
            <?php
            $mayor=0;
            $menor=10;
            $sumatorio=0;
            $media=0;
            //Creamos array con notas aleatorias:
            for ($n=0; $n<10; $n++){
                $notas[]= rand(1,10);
            }
            echo "<h2>Notas</h2> <br/>";
            foreach ($notas as $nota){
               echo "La nota actual es: $nota <br/>";
               //Asignamos el valor mayor
               if($nota>$mayor){
                   $mayor = $nota;
               }
               //El mínimo
               if($nota<$menor){
                   $menor = $nota;
               }
                $sumatorio += $nota;
            }
            $media =$sumatorio/count($notas);
            echo "<hr/>";
            echo "<h2>Estadística de las notas</h2> <br/>";
            echo "La nota mayor es $mayor  <br/>";
            echo "La nota menor es $menor  <br/>";
            echo "La nota media es $media  <br/>";

            ?>

        </div>
        </p>
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
