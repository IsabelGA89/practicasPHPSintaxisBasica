<?php
//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});

include "./utils/functions.php";
session_start ();

ver_errores();


//Variables:
$msj_info = "";
$msj_error = "";
$listado_bd = "";

//Obtengo los datos de conexión y la bd seleccionada
$datos = $_SESSION['conexion'];
$base_elegida = $datos['bd'];

//Vuelvo a conectar
$db = new BD($datos);

//Obtenemos las bases de datos de la conexión
$listado_bd = $db->print_data_tables($base_elegida);

$db->cerrar();

//Mensajes
if($listado_bd != ""){
    $msj_info= $db->get_info_message();
}else{
    $msj_error = $db->get_error_message();
}

//Ruteo
if(isset($_POST['submit']) && $_POST['submit'] == "Volver"){
    //eliminamos la variable de sesión de la bd y volvemos al index
    unset($_SESSION['conexion']['bd']);
    header('Location:index.php');
    exit();
}

if(isset($_POST['tabla']) ){
    $tabla_elegida = $_POST['tabla'];
    $_SESSION['tabla'] = $tabla_elegida;
    header('Location:gestionarTabla.php');
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Tablas BD</title>

</head>
<header>
    <h1>Tablas BD</h1>
</header>
<body>

<div class="container-fluid">
    <?php pintar_error($msj_error); pintar_info($msj_info); ?>

    <fieldset id="listado_bd">
        <legend>Listado bases de datos</legend>
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="tablas.php" method="post" class="form-inline">
                    <input type="submit" value="Volver" name="submit" class="btn btn-info">
                </form>
            </div>

        </div>
    </fieldset>

    <fieldset id="radios_bd">
        <legend>Gestión de las tablas de la base de datos <span class="variable"><?= $base_elegida ?></span></legend>
        <form action="tablas.php" method="post" class="form-inline">
        <?php
         if($listado_bd != ""){echo $listado_bd;}
        ?>
        </form>
    </fieldset>


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
