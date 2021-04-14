<?php



//Más complicado es obtener de forma independiente dia, mes ...
//De esta forma podríamos asignar por ejemplo nuestra fecha de nacimiento
do {
    $dia = rand(1, 31);
    $mes = rand(1, 12);
    $year = rand(1950, 2010);
    $hora = rand(0, 23);
    $minutos = rand(0, 59);
    $segundos = rand(0, 59);
} while (checkdate($mes, $dia, $year)) ;


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
<h2>Fecha aleatoria generada </h2>
<h3 style="color: #ac1f5b"><?=$fecha_aleatoria_string?></h3>
<h2>Timestamp de la fecha aleatoria generada </h2>
<h3>Si el timestamp es negativo la fecha será anterior a 1/1/1970</h3>
<h3 style="color: #ac1f5b"><?=$timestand_fecha_aleatoria?></h3>
<h2>Diferencia en segundos del timestamp aleatorio y el instante actual</h2>
<h3 style="color: #ac1f5b"><?=$dif_segundos?></h3>
<h2>Fecha de la diferencia en segundos</h2>
<h3 style="color: #ac1f5b"><?=$fecha_aleatoria_string?></h3>
<h4>Esta fecha muestra la fecha que es una vez transcurridos <?=$fecha_dif_segundos?> desde el 1/1/1970 00:00:00 </h4>




</body>
</html>
