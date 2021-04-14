<?php
spl_autoload_register (function ($clase) {
    require_once ("$clase.php");
});
//Establezco un tipo de conexión:
// o por defecto (BD_mysqli)
// o la que haya especificado el usuario
$tipo_conexion = filter_input (INPUT_POST,"tipo_conexion")?? "BD_mysqli";

//Tipo de conexión

//Obtengo los datos de conexión
if (isset ($_POST['submit'])) {
    switch ($_POST['submit']){
        case "Conectar":
            $datos = $_POST['datos'];
            break;
        case "Conectar con parámetros de ini":
            $datos = parse_ini_file ("conexion.ini");
    }


//Nos conectamos a la base de datos
    $con = $tipo_conexion=="BD_PDO"? new BD_PDO($datos): new BD_mysqli($datos);

//Obtenemos los datos de conexión

    $datos = $con->estado_conexion();
    $inf_bd = (string)$con;
    $con->cerrar();
}else {
    $datos = "<h2>Inserte datos de conexión para conectar</h2>";
    $inf_bd ="Actualmente no está conectado a la bd";
}
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilo_1.css" type="text/css">
    <title>Conexión a bd</title>
</head>
<body>
<h2>Conexión a una base de datos</h2>
<form action="index.php" method="post">
    <fieldset class="inner">
        <legend>Tipo de conexión</legend>

        <!--
        Establezco checked en el radio
        manteniendo la opción seleccionada
        -->
        <input type="radio" name="tipo_conexion" value="BD_mysqli" id="mysql"<?= $tipo_conexion=="BD_mysqli"? "checked":null?> /><label id="mysql">Mysqli </label><br/>
        <input type="radio" name="tipo_conexion" value="BD_PDO" id ="pdo" <?= $tipo_conexion=="BD_PDO"? "checked":null?>><label id="pdo">Mysqli PDO </label><br/>
    </fieldset>
    </fieldset>
    <legend>Datos de conexión (Hay un docker  con los datos: 172.17.0.2 root root dwes)</legend>
    <span style="font-size:15px; color:darkgreen; text-align:center">Valores puestos con placeholder que puedes usar</span><br />
    <label for="datos[host]">Host</label>
    <input type="text" name="datos[host]"  placeholder="172.17.0.2" id="host">
    <br/>
    <label for="datos[user]">Usuario</label>
    <input type="text" name="datos[user]"  placeholder="root" id="user">
    <br/>
    <label for="datos[password]">Password</label>
    <input type="text" name="datos[password]" placeholder="root" id="bd">
    <br/>
    <label for="datos[bd]">Base de datos</label>
    <input type="text" name="datos[bd]"  placeholder="dwes" id="bd">
    <br/>
    </fieldset>
    <input type="submit" value="Conectar" name="submit">
    <input type="submit" value="Conectar con parámetros de ini" name="submit">
</form>
<?=$datos?>
<h2>Estado de la base de datos</h2>
<h3><?=$inf_bd?></h3>


</body>
</html>
