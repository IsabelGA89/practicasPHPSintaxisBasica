<?php
$conector = filter_input (INPUT_POST,"conector")?? "BD_mysqli";


?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilo.css" type="text/css">
    <title>Conexión a bd</title>
</head>
<body>
<h2>Conexión a una base de datos</h2>
<form action="base_datos.php" method="post">
    <!--
     Establezco checked en el radio
     manteniendo la opción seleccionada
     -->
    <fieldset>
        <legend>Tipo de conector</legend>
        <input type="radio" name="conector" value="BD_mysqli" id="mysql"<?= $conector=="BD_mysqli"? "checked":null?> /><label id="mysql">Mysqli </label><br/>
        <input type="radio" name="conector" value="BD_PDO" id ="pdo" <?= $conector=="BD_PDO"? "checked":null?>><label id="pdo">Mysqli PDO </label><br/>    <label id="pdo">Mysqli PDO </label><br/>
    </fieldset>

    <fieldset>
        <legend>Datos de conexión</legend>
        <label for="host"></label>Host
        <input type="text" name="conexion[host]" id="host" value="172.17.0.2">
        <br/>
        <label for="user"></label>Usuario
        <input type="text" name="conexion[user]" id="user" value="root">
        <br/>
        <label for="user"></label>Password
        <input type="text" name="conexion[password]" id="bd" value="root">
        <br/>
    </fieldset>
    <fieldset>
        <legend>Conectar y Mostrar bases de datos</legend>
        <input type="submit" value="Parámetros del formulario" name="parametros">
        <input type="submit" value="Parámetros de fichero ini" name="parametros">
    </fieldset>
</form>
<hr/>


<h2>Estado de la base de datos</h2>

<h3><?= $con ?? "Inserte los datos de conexión para conectarse" ?></h3>


</body>
</html>
