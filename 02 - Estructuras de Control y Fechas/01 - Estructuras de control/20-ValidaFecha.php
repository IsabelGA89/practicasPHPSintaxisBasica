<?php

/**
 * @param $year año
 * un año es bisiesto si y solo si:
 * es divisible por 4 y no por cien
 * o bien
 * Si es divisible por 400
 */
function bisiesto($year){
    if (($year%4 ==0 AND $year%100!=0)OR($year %400 ==0))
        return true;
    else
        return false;
}
$dia = rand (1,32);
$mes = rand (1,14);
$year = rand (1000,2500);
$fecha ="$dia/$mes/$year";
$error=""; //Por defecto no hay error y por lo tanto la fecha es correcta

//En función del mes validamos los días. Reflexionar esto es una labaro de análisis

switch ($mes){
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        //Todos los casos son de 31 días
        if ($dia>31)
            $error="La fecha $fecha es incorrecta por que $dia es mayor que 31";
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        //Todos los casos son de 31 días
        if ($dia>30)
            $error="La fecha $fecha es incorrecta por que $dia es mayor que 30";
        break;
    case 2:
        if (bisiesto ($year)) {
            if ($dia > 29)
                $error = "La fecha $fecha es incorrecta por que $dia es mayor que 29 en año bisiesto";
        }else //si no es bisiesto
            if ($dia > 28)
                $error = "La fecha $fecha es incorrecta por que $dia es mayor que 28 en año no bisiesto";
        break;
    default:
        $error = "La fecha $fecha es incorrecta por que $mes  es mayor que 12";
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
if ($error =="") //fecha ok
    echo "<h2> la fecha <span style='color:#B01302'>$fecha</span> es correcta";
else{
    echo "<h2> la fecha <span style='color:#B01302'>$fecha</span> No es correcta";
    echo "<h3>Error encontrado <span style='color:red'>$error</span>";
}
?>
</body>
</html>
