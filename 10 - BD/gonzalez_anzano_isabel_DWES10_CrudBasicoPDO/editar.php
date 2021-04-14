<?php
//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
include "./utils/functions.php";
session_start();

/*imprime_sesiones();*/
/*imprime_bonito_post();*/

//Se obtienen los datos
$datos = $_SESSION['conexion'];
$tabla = $_SESSION['tabla'];
$datos_a_modificar = $_SESSION['gestion'];
/*var_dump($datos_a_modificar);*/

//Vuelvo a conectar
$db = new BD($datos);
$formulario = $db->print_update_register_form($datos_a_modificar);
$msj_info = $db->get_info_message();
$msj_error = $db->get_error_message();
$db->cerrar();
//$bd->actualizar($tabla, $campos);
switch ($_POST['submit']) {
    case 'guardar':
        $nueva_fila = $_POST['campos'];
        $bd = new BD($datos);
        $bd->prepared_update ($tabla,$datos_a_modificar,$nueva_fila);
        $msj_info = $bd->get_info_message();
        $msj_error = $bd->get_error_message();
        $bd->cerrar();
        if($msj_info!=""){
            $msj_info ="Se ha modificado el registro correctamente";
        }else{
            $msj_error = "Error al modificar el registro";
        }
        header("Location:gestionarTabla.php?msj_info=$msj_info&msj_error=$msj_error");
        exit();

    case 'cancelar':
        header("Location:gestionarTabla.php");
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
    <!--ICONOS FONT AWESOME-->
    <script src="https://kit.fontawesome.com/b4f679ca0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Crear Nuevo Registro</title>

</head>
<header>
    <h1>Editando un registro</h1>
</header>
<body>

<div class="container-fluid">
    <?php pintar_error($msj_error);?>

    <fieldset>
        <legend>Editanto Registro de la tabla <span class="variable"><?php echo $tabla ?></span></legend>
        <div class="row">
            <div class="col-md-12">
                <form role="form" action="editar.php" method="post" class="form-inline">

                    <?php
                    echo $formulario;
                    ?>


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

<?php

//Creo un formulario
//Paso por hidden dos arrais
//campos[] => Nombre de los campos de la tabla
//valorAnt[] => Valores del registro editado en la tabla
//valorNuevo[] => Valores del registro editado en la tabla.
//Estos son inputs, y por lo tanto voy a poder cambiar sus valores
//Estos valores (alguno de ellos son los que vamos a cambiar

function crea_formulario() {
  global $campos;
  foreach ($campos as $campo => $valor) {
    if (!(is_numeric($campo))) {
      echo "<label for = $campo>$campo</label>";
      echo "<input type = text name = valorNuevo[] value = '$valor'  /><br />";
      echo "<input type = hidden  name = campos[] value =  '$campo' />";
      echo "<input type = hidden name = valorAnt[] value= '$valor' />";
    }
  }
}

/**
 *
 * @param type $c arrays con los  nombres de los campos
 * @param type $vA arrays con los nombres antiguos
 * @param type $vN arrays con los nombres nuevos
 */
function generaSentenciaUpdate($tabla, $campos, $valorAnt, $valorNuevo) {
  $indice = 0;

  foreach ($campos as $nombreCampo) {
    $set .= "$nombreCampo = '" . $valorNuevo[$indice] . "', ";
    $where .= "$nombreCampo ='" . $valorAnt[$indice] . "' and ";
    $indice++;
  }
  $set = substr($set, 0, strlen($set) - 2);
  $where = substr($where, 0, strlen($where) - 5);
  $sentencia = "update $tabla set $set where $where ";
  echo $sentencia;
  return $sentencia;
}
?>



