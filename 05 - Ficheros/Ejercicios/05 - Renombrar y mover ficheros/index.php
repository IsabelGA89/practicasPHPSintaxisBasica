<?php
include('../../../../000 - Mis plantillas/02 - Functions/utiles.php');
/*ver_errores();
imprime_bonito_post();*/
//Inicializamos las variables que vamos a necesitar:
$directorio = "ficheros";

$url_directorio_base= __DIR__.DIRECTORY_SEPARATOR.$directorio;

$nombre_fichero = "";
$nombre_anterior = "";

//Ruteo
$opcion = $_POST['submit'] ?? "Empezar";
switch ($opcion){
    case "Empezar":
        $mensaje = "";
        break;
    case "copiar":
        if(isset($_POST['fichero_original'])){
            $nombre_anterior = $_POST['fichero_original'];
        }
        if(isset($_POST['fichero_nuevo'])){
            $nombre_fichero = $_POST['fichero_nuevo'];
        }
        if($nombre_anterior != "" && $nombre_anterior != "Selecciona un fichero para mover" && $nombre_fichero != ""){
            //Obtenemos la extensión del archivo anterior para que el nuevo tenga la misma:
            $extension= pathinfo($url_directorio_base.$nombre_anterior, PATHINFO_EXTENSION);
        $isRenamed = rename($url_directorio_base.DIRECTORY_SEPARATOR.$nombre_anterior,$url_directorio_base.DIRECTORY_SEPARATOR.$nombre_fichero.$extension);
        echo $isRenamed;
        }

        $mensaje = "Se ha movido $nombre_anterior a $nombre_fichero";
        break;
    default:
        header("Location:index.php");
        exit();
}


?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <!--   <link rel="stylesheet" href="/css/style.css">-->
    <title>Ejercicio 5</title>
</head>
<header>
    <h1>Renombrar y mover ficheros</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Trabajaremos sobre un directorio llamado ficheros de nuestro proyecto que tendrá una serie de ficheros<br/>
            mostraremos un desplegable con todos los ficheros <br/>
            una caja de texto nos permitirá poner el nuevo nombre del fichero selecionado
        </p>
        <pre>bool rename($origen,$desntino);</pre>
        <div style="background-color: lightpink">
            <!--FORMULARIO-->
            <form action="index.php" method="POST">
                <div class="form-group">
                    <div class="col">
                        <div class="nombre_fichero">
                            <label for="formFile" class="form-label">Nombre del fichero original</label>
                            <select class="form-select" id="fichero_original" name="fichero_original">
                                <option selected>Selecciona un fichero para mover</option>
                                <!--foreach para rellenar select-->
                                <?php
                                $array_ficheros = obtener_ficheros("ficheros");
                                if(sizeof($array_ficheros) < 1){
                                    echo '<option disabled
                                >No se encuentran ficheros en el directorio</option>';
                                }
                                foreach($array_ficheros as $fichero){
                                    echo '<option value="'.$fichero.'" name="nombreFichero" 
                                >'.$fichero.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="nombre_fichero_nuevo">
                            <label for="formFile" class="form-label">Nombre del fichero destino</label>
                            <input type="text" name="fichero_nuevo">
                        </div>

                    </div>
                    <div class="btn-group" role="group" style="margin-left: 50px;">
                        <button style="margin: 5px;" name="submit" value="copiar" type="submit" class="btn btn-secondary">Copiar</button>
                    </div>
                </div>
                <div class="alert alert-dark" role="alert"">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Listado de ficheros Actuales
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            $array_ficheros = obtener_ficheros("./ficheros");
                            if(sizeof($array_ficheros) < 1){
                                echo '<li class="list-group-item"
                                    >No se encuentran ficheros en el directorio</li>';
                            }
                            foreach($array_ficheros as $fichero){
                                echo '<li class="list-group-item" value="'.$fichero.'" name="nombreFichero" 
                                    >'.$fichero.'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <div class="footer-copyright text-center py-3">© 2020 Copyright
        Isabel González Anzano
    </div>
</footer>
<!-- Footer -->