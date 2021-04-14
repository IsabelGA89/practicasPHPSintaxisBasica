<?php
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
session_start();
include "./utils/functions.php";


//Inicialización de variables:
$listado_bds = "";
$bd_elegida = "";
$msj_info = "";
$msj_error = "";

//Si paso parámetros de conexión los leo
$datos_conexion = [];

if (isset($_POST['conectar']) && $_POST['conectar'] == "Conectar" && isset($_POST['datos'])){
    eliminar_sesion();

    //Obtenemos los nuevos datos:
    $datos_conexion = $_POST['datos'];
    $host = $datos_conexion['host'];
    //Guardamos en sesión los datos:
    $_SESSION['conexion'] = $datos_conexion;
    $listado_bds = pintar_tabla_bds($datos_conexion);

}elseif(isset($_SESSION['conexion'])){
    $datos_conexion = $_SESSION['conexion'];
    $host = $datos_conexion['host'];
}

//creo un objeto de conexión con la base de datos
$db = new BD($datos_conexion);
$informacion_version = $db->version();

//Mensajes
if($listado_bds != ""){
    $msj_info= $db->get_info_message();
}else{
    $msj_error = $db->get_error_message();
}
$db->cerrar();



//Ruteo
if(isset($_POST['submit']) && $_POST['submit'] == "Acceder"){
    $bd_elegida = $_POST['radio_bd'];
    $_SESSION['conexion']['bd'] = $bd_elegida;
    header('Location:tablas.php');
    exit();
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Gestor BD</title>

</head>
<header>
    <h1><img src="img/favicon-32x32.png" alt="icon-bd">SGBD Simple</h1>

</header>
<body>

<div class="container-fluid">
    <?php pintar_error($msj_error); pintar_info($msj_info); ?>

    <fieldset id="datos_conexion">
        <legend>Datos de conexión</legend>
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="index.php" method="post" class="form-inline">
                    <div id="host" class="form-group">
                        <label>
                            Host
                        </label>
                        <input type="text" class="form-control" value="172.17.0.2" name="datos[host]" id="host"/>
                    </div>
                    <div id="user" class="form-group">
                        <label>
                            Usuario
                        </label>
                        <input type="text" value="root" class="form-control" id="user" name="datos[user]"/>
                    </div>
                    <div id="password" class="form-group">
                        <label>
                            Password
                        </label>
                        <input type="password" value="root" class="form-control" id="user" name="datos[password]"/>
                    </div>
                    <input type="submit" value="Conectar" name="conectar" class="btn btn-info" onclick="asignarCheck()">

                </form>
            </div>
        </div>
    </fieldset>
        <?php
        if($listado_bds != ""){
            echo '<fieldset id="radios_bd">';
            echo '<legend>Gestión de las bases de datos del host <span class="variable">'.$host.'</span></legend>';
            echo '<h5>Version: <span class="variable">'.$informacion_version.'</span></h5>';
            echo  "<div class='row'>";
            echo  '<div class="col-md-12">';
            echo  '<form role="form" action="./index.php" method="post" class="form">';
            echo  '<div id="radios">';

            echo $listado_bds;

            echo '<input id="btn_acceder" type="submit" name="submit" value="Acceder" class="btn btn-dark">';

            echo '</form>';
            echo '</div>';
            echo '</div>';

            echo "<script>";
            echo "document.querySelector('#radio_bd_0').checked = true;";
            echo "</script>";
            echo "</fieldset>";
        }
        ?>

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

