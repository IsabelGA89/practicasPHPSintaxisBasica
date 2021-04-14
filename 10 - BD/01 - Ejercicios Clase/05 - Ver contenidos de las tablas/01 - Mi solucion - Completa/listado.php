<?php

//Arrancamos
spl_autoload_register(function ($clase) {
    require "./clases/$clase.php";
});
session_start ();

$datos = $_SESSION['conexion'];

$conector = $_SESSION['conector'];
$tabla = $_POST['submit'];
$bd = $_POST['nombre_tabla'];
$datos['bd'] = $bd;


//Nos conectamos a la base de datos (PDO O MYSQLI según se haya seleccionado
if($conector == "BD_PDO"){
    $con = new BD_PDO($datos);
}else{
    $con = new BD_mysqli($datos);
}


//Obtenemos las bases de datos de la conexión
$contenido_tablas=$con->get_table_content($tabla);


$con->cerrar();




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width=device - width, user - scalable=no, initial - scale=1.0, maximum - scale=1.0, minimum - scale=1.0">
    <meta http-equiv="X - UA - Compatible" content="ie=edge">
    <title>Listado</title>
</head>
<body>

<fieldset>
    <legend>Contenido de la tabla: "<?= $tabla ?>"</legend>
    <?php
    foreach($contenido_tablas as $tab)
        echo "<h3>$tab</h3> ";
    ?>
</fieldset>
</form>
<form action="base_datos.php" method="POST">
    <input type="submit" value="Volver">
    <input type="hidden" value="<?= $conector ?>" name="conector">
    <input type="hidden" value="<?= $tabla ?>" name="nombre_tabla">

</form>
</body>
</html>
