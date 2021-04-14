<?php
//Esta es la sección del controlador
$mes = rand(1, 12);

//Generamos una variable para el nombre del mes
$nombre="";


//Ahora en función del número del mes agregamos al mensaje su nombre
//Usamos una estructura switch
switch ($mes) {
    case 1: //En cada caso si no había nombre, lo actualizamos
        $nombre = $nombre==""? $nombre = "Enero": $nombre;
    case 3:
        $nombre = $nombre==""? $nombre = "Marzo": $nombre;
    case 5:
        $nombre = $nombre==""? $nombre = "Mayo": $nombre;
    case 7:
        $nombre = $nombre==""? $nombre = "Julio": $nombre;
    case 8:
        $nombre = $nombre==""? $nombre = "Agosto": $nombre;
    case 10:
        $nombre = $nombre==""? $nombre = "Octubre": $nombre;
    case 12:
        $nombre = $nombre==""? $nombre = "Diciembre": $nombre;
        $dias = 31;
        break;
    case 4:
        $nombre = $nombre==""? $nombre = "Abril": $nombre;
    case 6:
        $nombre = $nombre==""? $nombre = "Junio": $nombre;
    case 9:
        $nombre = $nombre==""? $nombre = "Septiembre": $nombre;
    case 11:
        $nombre = $nombre==""? $nombre = "Noviembre": $nombre;
        $dias = 31;
        break;
    case 2:
        $nombre = $nombre==""? $nombre = "Febero": $nombre;
        $dias = "28 o 29, dependerá si es bisiesto";
        break;
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
<?php
echo "<h3> Nombre de mes <span style='color:red'>$nombre</span></h3>";
echo "<h3> Número del mes <span style='color:red'>$mes</span></h3>";
echo "<h3> Número de días <span style='color:red'>$dias</span></h3>";


?><!-- Observa cómo visualizo la variable
</body>
</html>
