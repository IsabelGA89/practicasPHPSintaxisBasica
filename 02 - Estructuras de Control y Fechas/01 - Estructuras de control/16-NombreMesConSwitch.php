<?php
//Esta es la sección del controlador
$mes = rand(1, 15);

//Generamos un mensaje con el número de mes
$msj = "<h1>Mes número $mes</h1>";


//Ahora en función del número del mes agregamos al mensaje su nombre
//Usamos una estructura switch
switch ($mes) {
    case 1:
        $msj .= "<h2 style='color: red'>Enero</h2>";
        break;
    case 2:
        $msj .= "<h2 style='color: red'>Febrero</h2>";
        break;
    case 3:
        $msj .= "<h2 style='color: red'>Marzo</h2>";
        break;
    case 4:
        $msj .= "<h2 style='color: red'>Abril</h2>";
        break;
    case 5:
        $msj .= "<h2 style='color: red'>Mayo</h2>";
        break;
    case 6:
        $msj .= "<h2 style='color: red'>Junio</h2>";
        break;
    case 7:
        $msj .= "<h2 style='color: red'>Julio</h2>";
        break;
    case 8:
        $msj .= "<h2 style='color: red'>Agosto</h2>";
        break;
    case 9:
        $msj .= "<h2 style='color: red'>Septiembre</h2>";
        break;
    case 10:
        $msj .= "<h2 style='color: red'>Octubre</h2>";
        break;
    case 11:
        $msj .= "<h2 style='color: red'>Noviembre</h2>";
        break;
    case 12:
        $msj .= "<h2 style='color: red'>Diciembr</h2>";
        break;
    default :
        $msj .= "<h2 style='color: red'>No es correcto el mes </h2>";
}
?>

<!-- Esto es la vista -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicios dwes</title>
</head>
<body>
<?= $msj ?><!-- Observa cómo visualizo la variable
</body>
</html>
