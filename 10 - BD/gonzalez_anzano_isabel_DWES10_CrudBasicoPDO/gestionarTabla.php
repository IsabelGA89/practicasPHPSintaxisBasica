<?php
//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
include "./utils/functions.php";
session_start ();


//Variables:
$msj_info = "";
$msj_error = "";
$datos = $_SESSION['conexion'];
$tabla = $_SESSION['tabla'];
$tabla_html = "";


//Ruteo:
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case 'crear':
            header("Location:insertar.php");
            break;
        case 'modificar':
            $datos_para_modificar = $_POST['datos'];
            $_SESSION['gestion'] = $datos_para_modificar;
            header("Location:editar.php");
            exit();
            break;
        case 'eliminar':
            $datos_para_eliminar = $_POST['datos'];
            $bd = new BD($datos);
            $sentencia = "delete from $tabla where ";
            $condicion = "";
            foreach ($datos_para_eliminar as $campo => $valor) {
                $condicion .= " ($campo = '$valor') and ";
            }
            $condicion = substr($condicion, 0, strlen($condicion) - 4);
            $sentencia = "delete from $tabla where $condicion";
            $bd->borrar($sentencia);
            $msj_info = $bd->get_info_message();
            $msj_error = $bd->get_error_message();
            $bd->cerrar();
            break;
        case 'cerrar':
            header("Location:tablas.php");
            break;
    }
}
//Conexion
$db = new BD($datos);

$rdo = refresh_data_table($datos,$tabla);
$tabla_html = $rdo[0];
/*$msj_error = $rdo[2];
$msj_info =  $rdo[1];*/
$db->cerrar();
//Recogemos los mensajes de la actualización
if(isset($_GET['msj_info'])){
    $msj_info = $_GET['msj_info'];
}
if(isset($_GET['msj_error'])){
    $msj_error = $_GET['msj_error'];
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
    <!--ICONOS FONT AWESOME-->
    <script src="https://kit.fontawesome.com/b4f679ca0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Tablas BD</title>

</head>
<header>
    <h1>Gestion Tablas</h1>
</header>
<body>

<div class="container-fluid">
    <?php
    pintar_error($msj_error);
    if($msj_info != "Conectado correctamente"){
        pintar_info($msj_info);
    }
    ?>
    <fieldset id="listado_bd">
        <legend>Opciones de Navegación</legend>
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="tablas.php" method="post" class="form-inline">
                    <input type="submit" value="Volver atrás" name="submit" class="btn btn-info">
                </form>
            </div>

        </div>
    </fieldset>

    <fieldset id="registros">
        <legend>Administración de la tabla <span class="variable"><?php echo $tabla; ?></span></legend>
        <div class="row">
            <div class="col-md-12">
                    <?php
                        echo $tabla_html;
                    ?>
            </div>
        </div>
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



