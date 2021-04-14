<?php
//Control de errores *****************************++
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

//Controlador******************++++
//Recogemos valores:
$opcion = $_POST['radio'] ?? "w";
if (isset($_POST['submit'])) {
    //$opcion = $_POST['radio'] ?? "w";
    $nombreFichero = $_POST['nombre'];
    $contenidoFichero = $_POST['contenido'];
}

function imprime_bonito_post(){
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_POST, true));
        echo '</pre>';
    }
}
//imprime_bonito_post();
function imprime_directorio($direccion){
    $dir = scandir ($direccion);
    var_dump($dir);
}

//$nombre o ruta, $modo ( r=lectura, w=escritura, a=añadir) , $contenido a escribir
function crear_y_escribir_fichero($nombre,$modo,$contenido){
    if($nombre!="" && $contenido!=""){
        //Si es modo escritura, crea el fichero o lo machaca
        if($modo == "w"){
            //Si el final del nombre del archivo no es .txt se lo añadimos
            if(substr($nombre,-4) != ".txt") {
                $nombre = $nombre.".txt";
            }
        }
        $archivo = fopen($nombre,$modo);
        $escrito = fwrite($archivo, $contenido. PHP_EOL);

        $resultado = fclose($archivo);
        if($resultado && $escrito){
            echo "<p style='color: green'> - Se ha creado/modificado el archivo: <strong>$nombre</strong> correctamente</p>";
        }else{
            echo "<p style='color:red'>Se ha producido un error creando o modificando el archivo $archivo<p>";
        }
    }else{
        echo "<p style='color:red'>El nombre o el contenido del archivo está vacío y no se puede crear<p>";
    }

}

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <title>Ejercicio 1 Ficheros</title>
</head>
<header>
    <h1>Escribir en un fichero</h1>
</header>
<body>
<div class="container">
    <div class="jumbotron">
        <p>Realiza un programa para escribir contenido en un fichero: </br>
             - Lo podrás hacer tanto en modo añadir como en modo escribir</br>
             - Verifica luego en el directorio del proyecto que ha funcionado correctamente</br>
        </p>
        <div style="background-color: lightsteelblue">
                <form action="index.php" method="post">
                    <div class="form-group">
                        Nombre del fichero:<input type="text" class="form-control" value="" name="nombre" placeholder="ejemplo.txt" >
                    </div>
                    <div class="form-group">
                       Contenido del fichero
                        <textarea class="form-control" name="contenido" value="" rows="3"></textarea>
                    </div>
                    <hr/>
                    <div class="form-check" id="radios">
                        <legend class="col-form-label">Especifica el modo</legend>
                        <div  style="margin:20px;">
                            <input class="form-check-input" type="radio" name="radio" id="radio" value="w" <?php if($opcion == "w") echo "checked" ?>>
                            <label class="form-check-label">
                                Escritura
                            </label>
                        </div>
                        <div  style="margin:20px;">
                            <input class="form-check-input" type="radio" name="radio" id="radio" value="a" <?php if($opcion == "a") echo "checked" ?>>
                            <label class="form-check-label">
                                Añadir
                            </label>
                        </div>
                    </div>
                    <div class="form-group row" id="boton">
                        <div class="col-sm-10" style="margin:15px;">
                            <input type="submit" class="btn btn-primary" value="Guardar" name="submit">
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $opcion?>" name="opcion">
                    <!--<input type="hidden" value="<?php /*echo $nombreFichero*/?>" name="nombreFichero">
                    <input type="hidden" value="<?php /*echo $contenidoFichero*/?>" name="contenidoFichero">-->
                </form>
                <hr/>
            <?php
                crear_y_escribir_fichero($nombreFichero,$opcion,$contenidoFichero);
                //imprime_directorio(__DIR__);
            ?>

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


