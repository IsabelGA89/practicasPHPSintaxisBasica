<?php
//Arrancamos
spl_autoload_register (function ($clase) {
    require_once ("$clase.php");
});


//Obtengo los datos de conexión
switch ($_POST['parametros']) {
    case "Parámetros del formulario":
        $datos=$_POST['conexion'];
        break;
    case "Parámetros de fichero ini":
        $datos=parse_ini_file ("conexion.ini");
        break;
}
$conector=$_POST['conector'];

//Nos conectamos a la base de datos
$con=$conector == "BD_PDO" ? new BD_PDO($datos) : new BD_mysqli($datos);


//Obtenemos las bases de datos de la conexión
$listado_bd=$con->get_data_bases ();


$con->cerrar ();


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

<fieldset>
    <legend>Listado de bases de datos</legend>
    <?php foreach($listado_bd as $bd)
        echo "<h3>$bd</h3> ";
    ?>
</fieldset>
</form>
<form action="index.php" method="POST">
    <input type="submit" value="Volver">
    <input type="hidden" value="<?=$conector ?>" name="conector" ><!--Para mantener el conector-->
</form>
</body>
</html>
