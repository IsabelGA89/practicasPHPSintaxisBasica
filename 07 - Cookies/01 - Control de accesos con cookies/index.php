<?php
/**
 * Tendré dos cookies:
 * accesosErroneos ( un valor comprendido entre 1 y 3
 * Si el valor es 3, considero que estoy bloqueado
 * instanteBloqueo Instante time() en el que estoy bloqueado
 */


ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Esta función se invoca cuando estoy bloqueado
 * Si llevo más de 1 minuto me desbloquea (borra cookie)
 * Si no obtiene cuanto llevo bloqueado (instante actual menos instante en el que se bloqueó
 * @return string mensaje informando de la acción realizada y mostrando datos (tiempo que queda de blqueo)
 */
function gestionaBloqueo(): string
{
    $tiempo = time() - $_COOKIE['instanteBloqueo'];
    $minutos = date("i", $tiempo);
    $segundos = 60 - (date("s", $tiempo) + 60 * $minutos);
    if ($segundos <= 0) { //Hay que desbloquear
        $msj = "Se acaba de desbloquear y tiene hasta 3 intentos  ";
        setcookie('accesosErroneos', "", time() - 1); //Borro la cookie
        setcookie("instanteBloqueo", "", time() - 1);
    } else
        $msj = "Actualmente está bloqueado  y lo estará durante $segundos segundos ";
    return $msj;
}


/**
 * @param int $intentos
 * @return string
 */
function gestionaAccesosErroneos(int $intentos): string
{
    if ($intentos == 3) {//Anotar hora de bloqueo
        setcookie("instanteBloqueo", time(), time() + 60 * 5);
        $msj = "Se ha bloqueado y tiene 60 segundos para volver a intentar acceder";
    } else {
        $msj = "Ha realizado $intentos incorrectos, le quedan " . (3 - $intentos) . " intentos";
    }
    setcookie('accesosErroneos', $intentos, time() + 60 * 5);

    return $msj; //Borro la cookie
}

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case 'Acceder':
        $intentos = $_COOKIE['accesosErroneos'] ?? 0;
        if ($intentos == 3) { //Estoy bloqueado
            $msj = gestionaBloqueo();
        } else { //no estoy bloqueado
            $nombre = trim(filter_input(INPUT_POST, 'nombre'));
            $pass = trim(filter_input(INPUT_POST, 'pass'));
            if (($nombre == $pass) && ($nombre!="")) {
                setcookie('accesosErroneos', "", time() - 1); //Borro la cookie
                header("Location:sitio.php?name=$nombre");
                exit();
            }
            //Si estoy aquí, es por que nombre y pass no son iguales
            $intentos++;
            $msj = gestionaAccesosErroneos($intentos);
        }
        break;
    case "Reiniciar Cookies":
        setcookie('accesosErroneos', "", time() - 1); //Borro la cookie
        setcookie("instanteBloqueo", "", time() - 1);
        break;
    default:
}


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
<h1><?= $msj ?? "" ?></h1>
<fieldset>
    <legend>Datos de acceso</legend>
    <form action="index.php" method="POST">
        <div class="line_input">
            <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre"><br/>
        </div>
        <div class="line_input">
            <label for="pass">Password</label><input type="text" name="pass" id="pass"><br/>
        </div>
        <div class="line_input">
            <input type="submit" value="Acceder" name="submit">
            <input type="submit" value="Reiniciar Cookies" name="submit">
        </div>


    </form>
</fieldset>

</body>
</html>
