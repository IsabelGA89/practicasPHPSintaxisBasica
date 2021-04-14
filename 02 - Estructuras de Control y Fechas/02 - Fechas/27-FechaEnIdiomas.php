<?php



//Obtenemos una fecha aleatoria a partir de día, mes ... aleatorios
do {
    $dia = rand(1, 31);
    $mes = rand(1, 12);
    $year = rand(1950, 2010);
    $hora = rand(0, 23);
    $minutos = rand(0, 59);
    $segundos = rand(0, 59);
} while (checkdate($mes, $dia, $year)) ;

//Convertimos el string en timestamp
//Observa que requiere un formato mes/dia...
$timestand_fecha_aleatoria=strtotime("$mes/$dia/$year $hora:$minutos:$segundos");

//Establecemmos el idioam prviamente configurado en el sistema
//Obtenemos un string del timestamp con el formato en el idioma usando
//strftime
setlocale(LC_ALL, "fr_FR.UTF-8");
$fecha_fr = strftime("%A, %d  %B %Y",$timestand_fecha_aleatoria);
$fecha_fr2 = strftime("%c", $timestand_fecha_aleatoria);

setlocale(LC_TIME, "es_ES.UTF-8");
$fecha_es = strftime("%A, %d  %B %Y",$timestand_fecha_aleatoria);
$fecha_es2 = strftime("%c", $timestand_fecha_aleatoria);

setlocale(LC_TIME, "en_US.UTF-8");
$fecha_en = strftime("%A, %d  %B %Y",$timestand_fecha_aleatoria);
$fecha_en2 = strftime("%c", $timestand_fecha_aleatoria);


//Construimos el string con la fecha para visualizarlo posteriormente
$fecha_aleatoria_string ="$dia/$mes/$year $hora:$minutos:$segundos";

//Convertimos el string en timestamp
//Observa que requiere un formato mes/dia...
$timestand_fecha_aleatoria=strtotime("$mes/$dia/$year $hora:$minutos:$segundos");

//Obtenemos la diferencia en segundos
$dif_segundos=time()-$timestand_fecha_aleatoria;
//Obtenemos la fecha de la diferencia en segundos
$fecha_dif_segundos=date("d/m/y H:i:s");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
          user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">

    <title>Reloj</title>
</head>
<body>
<h2>Fecha en español </h2>
<h3 style="color: #ac1f5b"><?=$fecha_es?></h3>
<h3 style="color: #ac1f5b"><?=$fecha_es2?></h3>
<h2>Fecha en francés </h2>
<h3 style="color: #ac1f5b"><?=$fecha_fr?></h3>
<h3 style="color: #ac1f5b"><?=$fecha_fr2?></h3>
<h2>Fecha en Inglés </h2>
<h3 style="color: #ac1f5b"><?=$fecha_en?></h3>
<h3 style="color: #ac1f5b"><?=$fecha_en2?></h3>




</body>
</html>
