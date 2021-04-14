<?php

require "Racional.php";

 ?>

<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <!--   <link rel="stylesheet" href="/css/style.css">-->
    <title>POO Racional</title>
</head>
<header>
    <h1>POO Racional</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <pre>Construir una clase llamado racional.
            Se necesita que se pueda inicializar de diferentes formas, según se especifica:

            new Racional();//      1/1
            new Racional(5);//     5/1
            new Racional(5,7);//   5/7
            new Racional("9/7);//  9/7
            Implementa los siguientes métodos
            .-El método __toString, para visualizarlo,
            .-El método sumar, para sumar al objeto actual, y Racional que recibamos como argumento.
            .-El método restar, para restar al objeto actual, y Racional que recibamos como argumento.
            .-El método multiplicar, para multiplicar al objeto actual, y Racional que recibamos como argumento.
            .-El método dividir, para dividir al objeto actual, y Racional que recibamos como argumento.
            Todos los métodos aritméticos anteriores me deben retornar un Racional simplificado
        </pre>
        <p>
            Un número racional es aquel que puede ser expresado como una fracción de dos números enteros.
        </p>
        <div style="background-color: lightpink">
            <?php

            $r1 = new Racional();//      1/1
            $r2 =new Racional(5);//     5/1
            $r3 = new Racional(5,7);//   5/7
            $r4 = new Racional("9/7");//  9/7

            //Visualizamos:

            echo "Valor del racional \$r1  = $r1 <br />";
            echo "Valor del racional \$r2  = $r2 <br />";
            echo "Valor del racional \$r3  = $r3 <br />";
            echo "Valor del racional \$r4  = $r4 <br />";

            $a = new Racional("5/6");
            $b = new Racional (6,4);

            //Comprobamos las operaciones:
            echo "<hr/>";
            $c= $a->sumar($b,true);
            echo "<h3>Suma:</h3>";
            echo "$a+$b=$c";

            echo "<hr/>";
            $c= $a->restar($b,true);
            echo "<h3>Resta:</h3>";
            echo "$a-$b=$c";

            echo "<hr/>";
            $c= $a->dividir($b,true);
            echo "<h3>División:</h3>";
            echo "$a : $b=$c";

            echo "<hr/>";
            $c= $a->multiplicar($b,true);
            echo "<h3>Multiplicación:</h3>";
            echo "$a x $b=$c";

            echo "<hr/>";
            echo "<h3>Inversa:</h3>";
            $inversa = $r3->inversa($r3);
            echo "El racional inverso de $r3 es $inversa";


            echo "<hr/>";
            echo "<h3>SIMPLIFICADA:</h3>";
            $racional_simplificado = 95/56;
            $simplificada = $racional_simplificado->simplificar($this->numerador,$this->denominador);
            echo "SIMPLIFICADA ES: $simplificada";


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
    <div class="footer-copyright text-center py-3">© 2021 Copyright
        Isabel González Anzano
    </div>
</footer>
<!-- Footer -->
