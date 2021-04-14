<?php
const NUMERICO = 1;
const CADENA = "Esta constante es de tipo string";
const HEXADECIMAL = 0xAbC64;
const BINARIO = 0b0010;
$cadena_larga =<<<FINAL
            <pre>"Esta es una cadena
            de caracteres que utiliza
            Heredoc"</pre>
FINAL;

$expresion_numerica = HEXADECIMAL+BINARIO;


header("Refresh:5,url='index-intento2.php'");
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
    <title>Asignación en PHP</title>
</head>
<body>

<h1>Asignación en PHP</h1>

<div class="container jumbotron">
    <div class="enunciado">
        <h1>Enunciado</h1>
        <h2>Asigna a una variable valores de diferente procedencia</h2>
        <ul>
            <li>Un valor constante numérico: <div class="alert-primary"><?php $var = NUMERICO; echo $var; ?></div>  </li>
            <li>Un valor constante string: <div class="alert-primary"><?php $var = CADENA; echo $var; ?></div></li>
            <li>Un valor constante numérica con valor hexadecimal: <div class="alert-primary"><?php $var = HEXADECIMAL; echo $var; ?> | <?php printf("Valor del número en Hexadecimal %X ", $var);?></div></li>
            <li>Un valor constante numérica con valor binario: <div class="alert-primary"><?php $var = BINARIO; echo $var; ?> | <?php printf("Valor del número en binario %b ", $var);?> </div></li>
            <li>Un valor de una expresión de cadena de caracteres: <div class="alert-primary"><?php $var = $cadena_larga; echo $var; ?></div></li>
            <li>Un valor que devuelva una función , por ejemplo la función print: <div class="alert-primary"><?php $var = print("Llamada a función print --"); echo $var; ?></div></li>
            <li>El valor de una expresión que sea una asignación: <div class="alert-primary"><?php  $var = $var*15; echo $var; ?></div></li>
            <li>Un valor de una expresión numérica: <div class="alert-primary"><?php $var = $expresion_numerica; echo $var; ?></div></li>
        <p>Visualiza luego los valores especificando de dónde viene su valor</p>
        <i>Volver al index después de 5 segundos*</i>
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