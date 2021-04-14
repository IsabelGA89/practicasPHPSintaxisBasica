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
/**
 * Este ejecicio lo voy a plantear sin separ controlador y vista, sólo código php con la finalidad
 * De ver la forma de ir modificando el array y visualizándolo de forma seguid
 */
//En este caso sólo código php y var_dump para visualizar el array

//Delcaro y asigno valores al array
$array = [1, "pedro", "Almudena", 8, [6, 7, "juan"]];
echo "<h2>Visualizo el array </h2><hr />";
var_dump($array);

//Agrego elementos,  mantengo los valores anteriores
echo "<h2>Agrego dos elementos</h2><hr />";
$array[15] = "Otro elemento";
$array[30] = "Otro el último elemento";
echo "<h2>Visualizo el array despúes de agregar</h2><hr />";
var_dump($array);

//Recorro con foreach el array
//Y creo una copia de los valores en un array indexado
foreach ($array as $valor) {
    $array_copia[] = $valor;
}

//Copio y visualizo el array
$array = $array_copia;
echo "<h2>Visualizo el array compactado</h2><hr />";
var_dump($array);
?>

</body>
</html>
