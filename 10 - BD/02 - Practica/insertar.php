<?php
//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
include "./utils/functions.php";
session_start();

/*imprime_sesiones();*/
/*imprime_bonito_post();*/

//Variables:
$str_marcadores = "";
$arr_marcadores = [];

//Se obtienen los datos
$datos = $_SESSION['conexion'];
$tabla = $_SESSION['tabla'];

//Vuelvo a conectar
$db = new BD($datos);
//Obtengo datos para rellenar la tabla:
$nombres_columnas = $db->campos($tabla);
$formulario = $db->print_create_new_register_form($tabla);

/*if ($formulario != "") {
    $msj_info = $db->get_info_message();
} else {
    $msj_error = $db->get_error_message();
}*/


//Ruteo:
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case 'guardar':
        //Recoger los valores del Post:
        $data = $_POST['campos'];
        $res = $db->prepared_insert($tabla,$data);
        if($res == true){
            //recogemos el mensaje de información
            $msj_info = $db->get_info_message();
        }else{
            $msj_error = $db->get_error_message();
        }
        break;
    case 'cancelar':
        header("Location:gestionarTabla.php");
        break;
}

$db->cerrar();
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
    <title>Crear Nuevo Registro</title>

</head>
<header>
    <h1>Crear nuevo registro</h1>
</header>
<body>

<div class="container-fluid">
    <?php pintar_error($msj_error); pintar_info($msj_info); ?>

    <fieldset>
        <legend>Insertar nuevo registro en la tabla <span class="variable"><?php echo $tabla ?></span></legend>
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="insertar.php" method="post" class="form-inline">

                    <?php
                    echo $formulario;
                    ?>
                    <div class="btn-group">
                        <button type="submit" name="submit" value="guardar" class="btn btn-success boton"><i
                                    class="fa fa-save"></i> Guardar
                        </button>
                        <button type="submit" name="submit" value="cancelar" class="btn btn-danger boton"><i
                                    class="fa fa-close"></i> Cancelar
                        </button>
                    </div>

                </form>
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
