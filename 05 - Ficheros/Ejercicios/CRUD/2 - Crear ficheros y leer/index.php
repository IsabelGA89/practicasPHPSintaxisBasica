<?php
//Control de errores *****************************++
ini_set('display_errors',1);
error_reporting(E_ALL);

//Controlador******************++++
//Recogemos valores:
$opcion = $_POST['radio'] ?? "w";
$submit ="";
if (isset($_POST['submit'])) {
    //$opcion = $_POST['radio'] ?? "w";
    $nombreFichero = $_POST['nombre'];
    $contenidoFichero = $_POST['contenido'];
    $submit = $_POST['submit'];
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
function leer_fichero_linea($nombreFichero,$opcion){
    echo $opcion;
    if(file_exists($nombreFichero)){
        $texto = "";
        $archivo = fopen($nombreFichero,$opcion);
        //Mientras haya un línea que obtener, se concatena el contenido de la línea con la variable texto
        while($linea = fgets($archivo))
        {
            $texto .= $linea. "<br>";
        }
        fclose($archivo);
        return $texto;
    }else{
        echo "<p style='color:red'>El archivo no existe y por tanto, no se puede leer<p>";
    }
}
function leer_fichero($nombre){
    echo file_get_contents($nombre);
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
    <title>Ejercicio 2 Ficheros</title>
</head>
<header>
    <h1>Escribir y leer de un fichero</h1>
</header>
<body>
<div class="container">
    <div class="jumbotron">
        <div>Ejercicio de crear ficheros y leer</br>
            Puedes escribir un texto y un nombre de fichero  y se guardará</br>
            Puedes escribir un nombre de fichero  y se visualizará su contenido</br>
            Este ejercicio solo trabaja sobre los ficheros de la carpeta ./ficheros</br>
        </div>
        <div style="background-color: lightsteelblue">
            <form action="index.php" method="post">
                <div class="form-group">
                    Nombre del fichero:<input type="text" class="form-control" value="" name="nombre" placeholder="
                    <?php
                    if($submit == "Leer"){
                       echo $nombreFichero;
                    } ?>" >
                </div>
                <div class="form-group">
                    Contenido del fichero
                    <textarea class="form-control" name="contenido" placeholder="<?php
                    if($submit == "Leer"){
                        leer_fichero("./ficheros/$nombreFichero");
                    } ?>" rows="3"></textarea>
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
                    <div class="row-sm-10" style="margin:15px;">
                        <input type="submit" class="btn btn-primary" value="Guardar" name="submit">
                        <input type="submit" class="btn btn-primary" value="Leer" name="submit">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $opcion?>" name="opcion">

            </form>
            <hr/>
            <?php
            if($submit == "Guardar"){
                crear_y_escribir_fichero("./ficheros/$nombreFichero",$opcion,$contenidoFichero);
                //imprime_directorio(__DIR__);
            }


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
