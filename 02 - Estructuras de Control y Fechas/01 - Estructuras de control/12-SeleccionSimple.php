<?php
//Esta es la sección del controlador
$num = rand(1,100);
$msj = "<h1>Se ha generado el número $num</h1>";
if ($num%2==0)
    $msj .="<h2 style='color: red'>El número es par Has ganado</h2>"
?>

<!-- Esto es la vista -->
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
<?= $msj ?><!-- Observa cómo visualizo la variable
</body>
</html>
