<?php
//Por si quiero ver los errores
//error_reporting(E_ALL);
//ini_set("display_errors", true);


if (isset($_POST['enviar'])) {
    //Observa que $_POST['clicks']++ no funcionaría
    //Ya que primero leería para asignar y  luego incrementa con lo que el valor asignado
    //No se incrementa ....
    $clicks=++$_POST['clicks'] ;//observa que en el formulario $clicks está inicializo a 0, por lo que no habrá warning
    $msj="Has realizado $clicks hasta ahora.";
}else
    $msj="Inicializamos click por haber accedido a la página escribiendo su solicitud en la url";

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
<h2><?php echo $msj ?></h2>
<fieldset width="40%">
    <legend>Datos numéricos</legend>
    <form action="index.php" method="POST">
        <input type="submit" value="Haz click" name="enviar" />
        <input type="hidden" value="<?= $clicks ?? 0 ?>" name="clicks" />
    </form>
</fieldset>

</body>
</html>

