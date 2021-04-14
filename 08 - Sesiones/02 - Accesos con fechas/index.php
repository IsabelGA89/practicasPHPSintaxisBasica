<?php

session_start();

if ($_POST['submit'] == "Eliminar variables de sesión") {
    session_destroy();
    session_start();
}
$_SESSION['accesos'][] = time();
$accesos = array_reverse($_SESSION['accesos']);
$html = "";

foreach ($accesos as $acceso => $hora) {
    $pos = count($accesos) - $acceso;
    $html .= "<ul> Acceso número $pos a las " . date("H:i:s", $hora) . "</ul>";
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
    <title>Sesiones con fecha</title>
    <link rel="stylesheet" href="http://manuel.infenlaces.com/distancia/dwes/ejercicios/05_T5_Sesiones/02_T5_Sesiones_accesos_fechas/estilo.css">
</head>
<body>

<fieldset>
    <legend>Opciones</legend>
    <form action="index.php" method="POST">
        <input type="submit" name="submit" value="Enviar">
        <input type="submit" name="submit" value="Eliminar variables de sesión">
    </form>
</fieldset>
<fieldset class="fieldset2">
    <legend>Accesos en la sesión actual</legend>
    <li>
        <?= $html ?>

    </li>
</fieldset>

</body>
</html>
