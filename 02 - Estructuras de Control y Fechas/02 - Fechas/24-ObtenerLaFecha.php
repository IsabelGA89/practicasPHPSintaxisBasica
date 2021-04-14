<?php
//Priemro obtenemos los datos con las funciones


//La función time() retorna el número de segundos desde 1/1/1970, hasta el instante actual
$segundos_next_1970= time();
//La función date retorna un string con un formato especificado de una fecha
//Si no se le pasa segundo parámetro, tima el valor de time()
$fecha_actual = date ("d/m/Y H:i:s");

//Obtenemos el número de segundos desde el 1/1/1970 hasta dentro de 25 horas (60*60*25 segundos)
$timestamp_next_25_horas = time()+60*60*25;
$fecha_next_25_horas=  date ("d/m/Y H:i:s", $timestamp_next_25_horas);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Fechas</title>
</head>
<body>
<h2>Segundos desde el 1 de enero de 1970</h2>
<h2 style="color: #ac1f5b"><?=$segundos_next_1970?></h2>
<hr />
<h2>Fecha actual en formato d/m/s H:min:s</h2>
<h2 style="color: #ac1f5b"><?=$fecha_actual?></h2>
<hr />
<h2>Fecha dentro de 25 horas</h2>
<h2 style="color: #ac1f5b"><?=$fecha_next_25_horas?></h2>
<hr />

</body>
</html>
