<?php
/*spl_autoload_register(function ($clase) {
    require_once("index.php");
});*/
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
include "functions.php";


$tipo_conexion = filter_input(INPUT_POST, "tipo_conexion") ?? "BD_mysqli";

if (isset ($_POST['submit'])) {
    //Tipo de conexión
    switch ($_POST['submit']){
        case "Conectar":
            $datos = $_POST['datos'];
            break;
        case "Conectar con parámetros de ini":
            $datos = parse_ini_file ("conexion.ini");
            var_dump($datos);
    }

    $datos = $_POST['datos'];
    //Nos conectamos a la base de datos (PDO O MYSQLI según se haya seleccionado
    if($tipo_conexion == "BD_PDO"){
        $con = new BD_PDO($datos);
    }else{
        $con = new BD_mysqli($datos);
    }

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
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="/css/style.css">-->
    <title>Conectar a BD</title>
</head>
<header>
    <h1>Conectar a BD</h1>
</header>
<body>
<div class="container">
    <h1>Conexión con gestor de bases de datos</h1>
    <div class="jumbotron">
        <p><img src="img/enunciado1.png" alt=""></p>
        <div style="background-color: aliceblue">
            <fieldset class="inner">
                <legend>Tipo de conexión</legend>
                <input type="radio" name="tipo_conexion" value="BD_mysqli"
                       id="mysql"<?= $tipo_conexion == "BD_mysqli" ? "checked" : null ?> /><label
                        id="mysql">Mysqli </label><br/>
                <input type="radio" name="tipo_conexion" value="BD_PDO"
                       id="pdo" <?= $tipo_conexion == "BD_PDO" ? "checked" : null ?>><label id="pdo">Mysqli PDO </label><br/>
            </fieldset>
            <legend>Datos de conexión (Hay un docker con los datos: 172.17.0.2 root root dwes)</legend>
            <hr/>
            <form action="index.php" method="post">
                <div id="host">
                    <label>Host</label>
                    <div>
                        <input type="text" class="form-control" name="datos[host]" placeholder="localhost">
                    </div>
                </div>
                <div id="usuario">
                    <label>Usuario</label>
                    <div>
                        <input type="text" class="form-control" name="datos[user]" placeholder="root">
                    </div>
                </div>
                <div id="pasword">
                    <label>Password</label>
                    <div>
                        <input type="text" class="form-control" name="datos[password]" placeholder="root">
                    </div>
                </div>
                <div id="bd">
                    <label>Base de datos</label>
                    <div>
                        <input type="text" class="form-control" name="datos[bd]" placeholder="test">
                    </div>
                </div>
                <input type="submit" name="submit" value="Conectar">
                <input type="submit" value="Conectar con parámetros de ini" name="submit">
            </form>
            <?= $datos ?>
            <h2>Estado de la base de datos</h2>
            <h3><?= $inf_bd ?></h3>
        </div>

    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <div class="footer-copyright text-center py-3">© 2021 Copyright
        Isabel González Anzano
    </div>
</footer>
<!-- Footer -->