<?php
//Esta es la sección del controlador
$edad = rand(1,90);

$msj = "<h1>Tienes $edad años</h1>";

if ($edad < 18)
    $msj .="<h2 style='color: red'>Eres menor de edad</h2>"
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
