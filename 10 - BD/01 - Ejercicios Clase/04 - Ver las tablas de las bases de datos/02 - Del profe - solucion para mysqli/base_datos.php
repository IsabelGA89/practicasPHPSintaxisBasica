<?php
//Arrancamos
spl_autoload_register (function ($clase) {
    require_once ("$clase.php");
});

session_start ();

//Obtengo los datos de conexión
switch ($_POST['parametros']) {
    case "Parámetros del formulario":
        $datos=$_POST['conexion'];
        break;
    case "Parámetros de fichero ini":
        $datos=parse_ini_file ("conexion.ini");
        break;
    default: //Si no tengo datos de conexión lo leo de sesión
        $datos = $_SESSION['conexion'];
}

//Guiardamos los datos de conexión en variable de sesión
$_SESSION['conexion']=$datos;


//Nos conectamos a la base de datos
$bd= new BD_mysqli($datos);

//Si ha habido error en la conexión, vamos al index, informando de él
if ($bd->get_error()!=null) {
    $error=$bd->get_error();
    header("Location:index.php?error=$error");
}

//Obtenemos las bases de datos de la conexión
//Cambiamos el método, ya que vamos a necesitar uno más genérico
//que sirva también para otras consultas

/**
 * $listado_bd array asociativo con los bases de datos
 */
$listado_bd=$bd->get_data_bases();




$bd->cerrar ();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width=device - width, user - scalable=no, initial - scale=1.0, maximum - scale=1.0, minimum - scale=1.0">
    <meta http-equiv="X - UA - Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
<form action="tablas.php" method="POST">
    <fieldset>
        <legend>Listado de bases de datos</legend>
        <?php foreach($listado_bd as $bd)
            echo "<input type=submit name='submit' value='{$bd['Database']}'/> ";
        ?>
    </fieldset>
</form>
<form action="index.php" method="POST">
    <input type="submit" value="Volver">
    <input type="hidden" value="<?= $bd ?>" name="conector" ><!--Para mantener el conector-->
</form>
</body>
</html>
