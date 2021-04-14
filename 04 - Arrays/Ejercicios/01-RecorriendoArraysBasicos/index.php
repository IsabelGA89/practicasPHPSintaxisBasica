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
    <title>Ejercicio 1</title>
</head>
<header>
    <h1>Ejercicio 1 - Recorrer un array básico</h1>
</header>
<body>
<div class="container">

    <h1>Enunciado</h1>
    <div class="jumbotron">
    <p>Crea un array indexado con 5 valores de países y recórrelo con un for <br/>
        <div style="background-color: lightpink">
        <ul>
        <?php
        $paises_indexado =["España","Francia","Portugal","Bélgica","Andorra"];
        $num_elementos = sizeof($paises_indexado);
            for($i=0;$i<$num_elementos;$i++){
                echo "<li>". $paises_indexado[$i]."</li>";
            }
        ?>
        </ul>
        </div>
    </p>
    <p>Ahora crea un array con 5 países como índice y sus correspondiente capitales como valores, después recorrelo con un foreach
        <div style="background-color: lightpink">
        <?php
            $capitales= ["España"=>"Madrid", "Francia"=>"Paris","Italia"=>"Roma","Alemania"=>"Berlín","Bélgica"=>"Bruselas"];
            foreach ($capitales as $capital => $indice){
                echo $capital." - ".$indice."</br>";
            }
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
</html>