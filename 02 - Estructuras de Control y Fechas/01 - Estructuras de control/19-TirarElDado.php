<?php
//Se plantea y decide que los 100 primeros números naturalesa
//Van del 0 al 99 Decidir esto es análisis ...

//Para evitar warning
$total_unos =0;
$total_dos =0;
$total_tres =0;
$total_cuatro =0;
$total_cinco =0;
$total_seis =0;

for ($tiradas=0; $tiradas<100000; $tiradas++){
    $numero = rand(1,6);
    if ($numero == 1)
        $total_unos++;
    if ($numero == 2)
        $total_dos++;
    if ($numero == 3)
        $total_tres++;
    if ($numero == 4)
        $total_cuatro++;
    if ($numero == 5)
        $total_cinco++;
    if ($numero == 6)
        $total_seis++;

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
<h1>Resultado de realizar 100000 tiradas</h1>
<h2>Total de salidas del número 1 <span style="color: #0000b3"><?=$total_unos?></span></h2>
<h2>Total de salidas del número 2 <span style="color: #0000b3"><?=$total_dos?></span></h2>
<h2>Total de salidas del número 3 <span style="color: #0000b3"><?=$total_tres?></span></h2>
<h2>Total de salidas del número 4 <span style="color: #0000b3"><?=$total_cuatro?></span></h2>
<h2>Total de salidas del número 5 <span style="color: #0000b3"><?=$total_cinco?></span></h2>
<h2>Total de salidas del número 6 <span style="color: #0000b3"><?=$total_seis?></span></h2>

</body>
</html>
