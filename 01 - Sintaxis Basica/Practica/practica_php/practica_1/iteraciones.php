<?php

function suma_pares($num){
    $i = 0;
    while ($i < $num) {
        if($i % 2 == 0){
            $suma+=$i;
        }
        $i++;
    }
    return $suma;
}
$suma = suma_pares(100);

header("Refresh:2,url='index-intento2.php'");
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/ico" sizes="32x32" href="../favicon.ico">
    <title>Iteraciones en PHP</title>

</head>
<body>

<h1>Iteraciones en PHP</h1>

<div class="container jumbotron">
    <div class="enunciado">
        <h1>Enunciado</h1>
        <h2>Haz un programa que:</h2>
        <ul>
            <li>Suma los 100 primeros números pares</li>
        </ul>
        <i>Volver al index después de 2 segundos*</i>
    </div>
    <div class="respuesta alert-success">
        <h1>Respuesta:</h1>
        <?php
        echo "El total de la suma de los 100 primeros números pares es: $suma";
        ?>
    </div>
</div>


<div class="list-group">
    <div class="container">
        <a href="index.php"><img src="img/inicio.png" alt="volver a inicio"></a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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