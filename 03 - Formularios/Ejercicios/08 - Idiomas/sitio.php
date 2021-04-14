<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 16/02/18
 * Time: 14:55
 */

$idioma = $_POST ['idioma'];
$nombre = $_POST['nombre'];
if ($nombre=="")
    header("Location:index.php?idioma=$idioma");

switch ($idioma) {
    case frances:
        $saludo = "Bienvenue sur ce site $nombre";
        break;
    case ingles:
        $saludo = "Wellcome to this Website $nombre";
        break;
    case castellano:
        $saludo = "Bienvenido a esta página web $nombre";
        break;
}


?>
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
<h1><?php echo $saludo ?> </h1>
</body>
</html>
