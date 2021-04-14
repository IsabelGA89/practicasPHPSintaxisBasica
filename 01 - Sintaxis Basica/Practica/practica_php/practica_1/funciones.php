<?php

function duplica_devuelve_max(&$a,$b){
    echo "valores recibidos $a, $b <br/>";
    $a=$a*2;
    $b=$b*2;
    echo "--- <br/>";
    echo "valor de las variables duplicado <br/>";
    echo "---- <br/>";
    echo "Valores duplicados: $a y $b <br/>";
    if ($a > $b){
        return $a;
    }else{
        return $b;
    }
}

function variable_global(&$a,$b){
    define("VAR_GLOBAL_DENTRO_DE_FUNCION",$b);
    echo "Creada variable global e igualada al segundo parámetro de la función<br/>";
    echo "variable b: $b <br/>";
    echo "variable global: ".VAR_GLOBAL_DENTRO_DE_FUNCION." <br />";

    return VAR_GLOBAL_DENTRO_DE_FUNCION;
}

function start(){
    $a = rand(1,1000);
    $b = rand(1,1000);
    echo "Valores creados: $a y $b <br/>";

    duplica_devuelve_max($a,$b);
    echo "Visualizamos los valores fuera de la función $a y $b <br/>";


    echo "-------------------------------------------------------- <br />";
    $nueva_variable = variable_global($a,$b);
    echo "La nueva variable, fuera de la función vale: $nueva_variable <br/>";
    echo "Esto pasa si intento acceder a la variable global tal cual: ".VAR_GLOBAL_DENTRO_DE_FUNCION." .";
}

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
    <title>Funciones en PHP</title>

</head>
<body>

<h1>Funciones en PHP</h1>

<div class="container jumbotron">
    <div class="enunciado">
        <h1>Enunciado</h1>
        <h2>Haz una función que reciba dos variables $a y $b $a se ha de pasar por referencia $b por valor</h2>
        <ul>
            <li>La función duplica el valor de los parámetros</li>
            <li>La función devuelve el valor mayor de los dos</li>
            <li>El programa principal creará hará lo siguientes:</li>
            <pre>
                1.-Crea dos valores en variables
                2.-Visualiza sus valores
                3.-Invoca a la función
                4.-Visualiza los valores de los parámetros
                5.-Hace lo especificado
                6.-Visualiza los valores
                7.-Después de la llamada a la función se visualizarán los valores.
                8.-Plantea que pasará si creamos dentro de la función una variable global que sea el igual
                al segundo parámetro de  la función.
            </pre>

        </ul>
        <i>Volver al index después de 5 segundos*</i>
    </div>
    <div class="respuesta alert-success">
        <h1>Respuesta:</h1>
        <?php start(); ?>
    </div>
    <hr/>
    <div class="teoria alert-info">
        <h1>Teoría</h1>
        <h2>Paso por referencia</h2>
        <p>Al pasar por valor, el argumento de la función crea su propia referencia.
        Dentro y fuera de la función las referencias en memoria son diferentes.</p>
        <p>También se puede devolver por referencia. Si se utiliza el símbolo & delante del nombre de una función o de un método,
            la variable que devuelva se devolverá por referencia.</p>

        <h2>Paso por valor</h2>
        <p>Además de pasar el valor a la función, se pasa la referencia a la variable original.
        De este modo, si el valor cambia dentro de la función, también cambiará en la variable original.
        Para indicar que el argumento de una función se pasa por referencia, se utiliza el símbolo & (ampersand, et)
        delante del argumento.</p>
    </div>


<div class="list-group">
    <div class="container">
        <a href="index.php"><img src="img/inicio.png" alt="volver a inicio"></a>
    </div>
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