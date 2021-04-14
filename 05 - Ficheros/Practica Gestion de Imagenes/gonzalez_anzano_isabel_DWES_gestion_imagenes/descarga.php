<?php
ob_start();
session_start();

ini_set("display_errors", true);
error_reporting(E_ALL);

require_once "funciones.php";

/*imprime_bonito_post();*/
/*imprime_bonito_files();*/


//Inicilizo variables
$name = $_POST['name'] ?? "";
$pass = $_POST['pass'] ?? "";
$ficheros_publicar = [];
$admin = false;
$ficheros ="";
$ruta_subida = "";

//Verifico condiciones
if ($name == "") {
    //preparamos información para el log
    $accion = "ERROR - Acceso DENEGADO falta información: NOMBRE";
    //creamos el log:
    crear_fichero_log('logs',$_POST['name'],$_POST['pass'],$accion,null,null);
    header("Location:index.php?msj='Debe registrarse y especificar nombre'");
    exit();
}
if ($pass =="") {
    //preparamos información para el log
    $accion = " ERROR - Acceso DENEGADO falta información: PASSWORD";
    //creamos el log:
    crear_fichero_log('logs',$_POST['name'],$_POST['pass'],$accion,null,null);
    header("Location:index.php?msj='Debe registrarse y especificar password'");
    exit();
}
if (($pass === 'admin') and ($name === 'admin')){
    //preparamos información para el log
    /*$accion = "Acceso de Usuario Administrador confirmado";
    crear_fichero_log('logs',$_POST['name'],$_POST['pass'],$accion,null,null);*/
    $admin = true;
}


//Evalúo la acción que trajo a este script
$opcion = $_POST['enviar'];
//Crear el sistema de carpetas:
crear_sistema_carpetas_inicial();
//Obtengo el fichero
if(isset($_FILES['fichero'])){
    $file = $_FILES['fichero'];
}

switch ($opcion) {
    case 'Acceder':
        $ficheros = acceso($admin);
        break;
    case 'Subir fichero':
        $ruta_subida = subir_fichero($file);
        $ficheros = acceso($admin);
        redireccion_home($ruta_subida,$file);
        break;
    case 'Subir fichero y acceder':
        $ruta_subida = subir_fichero($file);
        if($ruta_subida != null || $ruta_subida != "" || $ruta_subida != 1){
            //LOG - subida fichero
            $accion = "Subido fichero a carpeta privada correctamente";
            log_file($accion,$file['name'],$_POST['name'],$_POST['pass'],$ruta_subida);
        }
        $ficheros = acceso($admin);
        if($ficheros != ""){
            //LOG - Acceso
            $accion = "Acceso de usuario";
            crear_fichero_log('logs',$_POST['name'],$_POST['pass'],$accion,null,null);
        }
        break;
    case 'publicar':
        $ficheros_subir = $_POST['ficheros_publicar'];
       /* imprime_bonito_array($ficheros_subir);*/
        $hanSubido = publicar_ficheros($ficheros_subir);
        if($hanSubido == true){
            if(sizeof($ficheros_subir) > 1){
                multiple_log_file_published($ficheros_subir,$_POST['name'], $_POST['pass'],null);
            }else{
                $accion = " Archivo publicados";
                log_file($accion, $ficheros_subir, $_POST['name'], $_POST['pass'], null);
            }
        }else{
            $accion = " ERROR - Se ha producido un error publicando el/los archivos/s";
            log_file($accion, null, $_POST['name'], $_POST['pass'], null);
        }
        $ficheros = acceso($admin);
        break;
    default:
        header("Location:index.php?msj='Debe registrarse para subir ficheros'");
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Icon-->
    <link rel="icon" type="image/ico" sizes="32x32" href="favicon.ico">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <script type="text/javascript" src="js/functions.js"></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js'></script>

    <title>Descarga de ficheros</title>

</head>
<body>
<div><?php $ficheros ?></div>

<script>
    botones_dinamicos();
</script>
</body>
</html>
