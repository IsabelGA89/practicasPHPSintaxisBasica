<?php

/**
 * Cuidado con este ejercicio, una variable de cookie debe de ser un string
 * Si quiero guardar un array, lo debo de serializar
 */


$accesos = unserialize($_COOKIE['accesos']) ?? [];
$opcion = $_POST['submit'];
switch ($opcion) {
    case 'Acceder':
        $nombre = $_POST['nombre'];
        if ($nombre == "")
            break;
        $accesos[$nombre][] = time();

        setcookie("accesos", serialize($accesos), time() + 24 * 60 * 60);
        /*Preparamos la inforación para visualziar */
        $msj = "<h2>El usuario <span style='color:darkblue'>$nombre</span> ha tenido los siguientes accesos</h2>";
        foreach ($accesos[$nombre] as $num => $acceso)
            $msj .= "<h3> Accesos <span style='color:darkslategrey'>$num </span><span style='color:darkblue'> : " . date("d-m-Y h:i:s", $acceso) . "</span></h3>";
        break;
    case "Borrar cookies":
        //Eliminamos la información
        $accesos = [];
        setcookie("accesos", "", time() - 1);
}

if (count($accesos) > 0) {
    $msj .= "<h2>Listado de accesos totales</h2>";
    foreach ($accesos as $nombre => $accesos)
        $msj .= "<h3> <span style='color:darkblue'>$nombre =>  " . count($accesos) . " </span> accesos</h3>";
}else
    $msj .= "No hay accesos de usuarios";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Contro de acceso</title>
</head>
<body>
<h1>Información de accesos </h1>
<h1><?= $msj ?? "" ?></h1>
<fieldset>
    <legend>Datos de acceso</legend>
    <form action="index.php" method="POST">
        <div class="line_input">
            <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre"><br/>
        </div>
        <div class="line_input">
            <input type="submit" value="Acceder" name="submit">
            <input type="submit" value="Borrar cookies" name="submit">
        </div>
    </form>
</fieldset>

</body>
</html>
