<?php

//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
session_start ();

$datos = $_SESSION['conexion'];
$conector = $_SESSION['conector'];

if(isset($_POST['submit'])){
    $nombre_tabla=$_POST['submit'];
}

//Nos conectamos a la base de datos (PDO O MYSQLI según se haya seleccionado
if($conector == "BD_PDO"){
    $con = new BD_PDO($datos);
}else{
    $con = new BD_mysqli($datos);
}


//Obtenemos las bases de datos de la conexión
$listado_tablas = $con->get_data_tables($nombre_tabla);

$con->cerrar();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width=device - width, user - scalable=no, initial - scale=1.0, maximum - scale=1.0, minimum - scale=1.0">
    <meta http-equiv="X - UA - Compatible" content="ie=edge">
    <title>Tablas</title>
</head>
<body>
<form action="listado.php" method="POST">
<fieldset>
    <legend>Listado de tablas de la base de datos "<?= $nombre_tabla ?>"</legend>
    <?php
    foreach($listado_tablas as $tabla){
        echo "<input type=submit name='submit' value='{$tabla}'/> ";
        $tabla_elegida = $tabla;
    }
    ?>
    <input type="hidden" value="<?= $tabla_elegida ?>" name="tabla_elegida" >
    <input type="hidden" value="<?= $nombre_tabla ?>" name="nombre_tabla" >
</fieldset>
</form>
<form action="base_datos.php" method="POST">
    <input type="submit" value="Volver">
    <input type="hidden" value="<?= $conector ?>" name="conector" >
</form>
</body>
</html>
