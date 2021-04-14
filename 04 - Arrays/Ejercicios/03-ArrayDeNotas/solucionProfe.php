<?php
//Creamos un array con 10 notas
for ($n=0; $n<10; $n++){
    $notas[]=rand (1,10);
}

//La primera nota será la máxima y la mínima al principio
$min = $notas [0];
$max =$min;
$total =0;
//Recorro el array y voy obteniendo la información que necesito
foreach ($notas as $nota) {
    $min = $min > $nota ? $nota : $min;
    $max = $max < $nota ? $nota : $max;
    $total += $nota;
    $msj_notas.="<h3>La nota actual es $nota</h3>";
}
//Una vez recorrido, ya sabré los datos estadísticos
$msj_notas.="<h2>Estadística de las notas</h2>";
$msj_notas.="<h3>La nota mayor es $max</h3>";
$msj_notas.="<h2>La nota menor es $min</h2>";
$media = $total / count($notas);
$msj_notas.="<h2>La nota media es $media </h2>";
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
<?=$msj_notas?>
</body>
</html>
