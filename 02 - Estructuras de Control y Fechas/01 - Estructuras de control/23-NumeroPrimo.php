<?php

//Generamos el número
$numero = rand(0, 100);


//Solo tenemos que comprobar si es divisible hasta la mitad, luego ya no va a ser divisible por ningún otro número
//Esto es análisis del problema
$primo = true; //Por defecto vemos que es primo
$tope = $numero / 2;
$contador = 2;

if ($numero != 0) //solo lo hacemos si no es cero, si lo fuera, ya tenemos que es primo
    while ($contador <= $tope and $primo == true) {
        if ($numero % $contador == 0)
            $primo = false;
        $contador++;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
if ($primo == true)
    echo "<h2>El número <span style='color: #532F8C'>$numero</span> es primo";
else
    echo "<h2>El número <span style='color: #532F8C'>$numero</span> no es primo";
?>
</body>
</html>
