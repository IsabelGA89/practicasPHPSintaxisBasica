<?php

session_start();

$accesosSubmit = $_SESSION['accesoSubmit'] ?? 0;
$accesosURL = $_SESSION['accesosURL'] ?? 0;

$opcion = $_POST['submit']??null;
switch ($opcion){
    case 'Enviar':
        $accesosSubmit++;
        break;
    case 'Borrar Cookies':
        $accesosSubmit=0;
        $accesosURL=0;
        session_destroy();
        break;
    default:
        $accesosURL++;
}

if ($accesosSubmit==0)
    $msjSubmit ="No has accedido ninguna vez haciendo click en submit ";
else
    $msjSubmit ="Has accedido $accesosSubmit veces haciendo click en submit enviar ";
if ($accesosURL==0)
    $msjURL="No has accedido ninguna vez haciendo click en submit Acabas de borrar cookies";
else
    $msjURL ="Has accedido $accesosURL veces escribiendo en la url este recurso";

$_SESSION['accesoSubmit'] = $accesosSubmit;
$_SESSION['accesosURL'] =$accesosURL;



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
<h1>Accesos en la sesión actual</h1>
<h2><?= $msjSubmit ?></h2>
<h2><?= $msjURL ?></h2>
<form action="index.php" method="POST">

    <input type="submit" name="submit" value="Enviar">
    <input type="submit" name="submit" value="Borrar Cookies">

</form>

</body>
</html>
