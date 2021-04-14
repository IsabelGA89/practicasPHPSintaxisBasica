<?php
//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
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
//Guardamos los datos de conexión en variable de sesión
$_SESSION['conexion']=$datos;

$conector=$_POST['tipo_conexion'];

//Nos conectamos a la base de datos (PDO O MYSQLI según se haya seleccionado
if($conector == "BD_PDO"){
    $con = new BD_PDO($datos);
}else{
    $con = new BD_mysqli($datos);
}


//Obtenemos las bases de datos de la conexión
$listado_bd=$con->get_data_bases();


$con->cerrar();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width=device - width, user - scalable=no, initial - scale=1.0, maximum - scale=1.0, minimum - scale=1.0">
    <meta http-equiv="X - UA - Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="tablas.php" method="POST">
<fieldset>
    <legend>Listado de bases de datos</legend>
    <?php foreach($listado_bd as $bd)
        echo "<input type=submit name='submit' value='{$bd}'/> ";
    ?>
</fieldset>
</form>
<form action="index.php" method="POST">
    <input type="submit" value="Volver">
    <input type="hidden" value="<?= $conector ?>" name="conector" >
</form>
</body>
</html>
