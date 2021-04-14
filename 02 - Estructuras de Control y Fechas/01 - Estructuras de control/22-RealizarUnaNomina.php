<?php
const PRECIO_HORA = 21.5;
$horas = rand(20, 60);


if ($horas > 40) // hay horas extras
    $bruto = 40 * PRECIO_HORA + ($horas - 40) * (PRECIO_HORA * 1.5);
else
    $bruto = $horas * PRECIO_HORA;

switch (true) {
    case $bruto < 600:
        $irpf_procentaje = 0;
        break;
    case $bruto > 600 and $bruto < 800 :
        $irpf_procentaje =  0.05;
        break;
    case $bruto > 800:
        $irpf_procentaje = 0.12;
        break;
}
$irpf = $bruto * $irpf_procentaje;
$neto = $bruto - $irpf;

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
<h1>Resumen de la nómina</h1>
<h3>Total horas trabajadas  <span style="color: #532F8C"> <?=$horas ?> euros</span></h3>
<h3>Total bruto  <span style="color: #532F8C"><?=$bruto ?> euros</span></h3>
<h3>Irpf a aplicar  <span style="color: #B01302"><?=$irpf_procentaje ?>%</span></h3>
<h3>Total descuento irpf  <span style="color: #B01302"><?=$irpf ?> euros </span></h3>
<hr />
<h2>Total neto a percibir  <span style="color: #532F8C"><?=$neto ?> euros </span></h2>


</body>
</html>
