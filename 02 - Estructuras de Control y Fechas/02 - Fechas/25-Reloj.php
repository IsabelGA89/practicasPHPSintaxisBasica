<?php

//Vamos obteniendo cada dato
$hora = date("h");
$minutos = date("i");
$segundos  = date("s");
//La fucin microtime retorna un string con "microsegundos segundos"
$timestamp_microsegundos = microtime();

//Obtenemos la posición del espacio en blanco que separa segundos microsegundos
$pos_milisengudos = strpos ($timestamp_microsegundos,  " ");

//Nos quedamos con los microsegundos
$microsegundos = substr($timestamp_microsegundos, 0, $pos_milisengudos-1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
          user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="refresh" content="0.01">
    <title>Reloj</title>
</head>
<body>
<h2 style="color: blue" ><?=" $hora : $minutos : $segundos : $microsegundos" ?> </h2>

</body>
</html>
