<?php
$tipo_conexion = filter_input(INPUT_POST, "tipo_conexion") ?? "BD_mysqli";

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
        <p><img src="enunciado.png" alt=""></p>
        <div style="background-color: aliceblue">
            <form action="base_datos.php" method="post">
                <fieldset class="inner">
                    <legend>Tipo de conexión</legend>
                    <input type="radio" name="tipo_conexion" value="BD_mysqli"
                           id="mysql"<?= $tipo_conexion == "BD_mysqli" ? "checked" : null ?> /><label
                            id="mysql">Mysqli </label><br/>
                    <input type="radio" name="tipo_conexion" value="BD_PDO"
                           id="pdo" <?= $tipo_conexion == "BD_PDO" ? "checked" : null ?>><label id="pdo">Mysqli
                        PDO </label><br/>
                </fieldset>
                <legend>Datos de conexión (Hay un docker con los datos: localhost isabel test)</legend>
                <hr/>
                <fieldset>
                    <legend>Datos de conexión</legend>
                    <label for="host"></label>Host
                    <input type="text" name="conexion[host]" id="host" value="localhost">
                    <br/>
                    <label for="user"></label>Usuario
                    <input type="text" name="conexion[user]" id="user" value="isabel">
                    <br/>
                    <label for="user"></label>Password
                    <input type="text" name="conexion[password]" id="bd" value="">
                    <br/>
                </fieldset>
                <hr/>
                <fieldset>
                    <legend>Conectar y Mostrar bases de datos</legend>
                    <input type="submit" value="Parámetros del formulario" name="parametros">
                    <input type="submit" value="Parámetros de fichero ini" name="parametros">
                </fieldset>
                <hr>
                <h2>Estado de la base de datos</h2>

                <h3><?= $con ?? "Inserte los datos de conexión para conectarse" ?></h3>
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