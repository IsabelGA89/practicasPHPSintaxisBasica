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
//Declaro los precios de 5 productos
$lechugas = 1.20;
$patatas = 1.05;
$naranjas = 2.15;
$fresas = 4.20;
$mandarinas = 0.97;
//Ahora voy asignando a la variable producto el nombre de cada variable, con lo que estoy
//creando una variable de variable

$producto = "lechugas";
echo "<h1>El precio de $producto es ${$producto}</h1>";
$producto = "patatas";
echo "<h1>El precio de $producto es ${$producto}</h1>";
$producto = "naranjas";
echo "<h1>El precio de $producto es ${$producto}</h1>";
$producto = "fresas";
echo "<h1>El precio de $producto es ${$producto}</h1>";
$producto = "mandarinas";
echo "<h1>El precio de $producto es ${$producto}</h1>";
?>

</body>
</html>
