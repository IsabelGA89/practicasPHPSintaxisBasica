<?php
//Control de errores *****************************++
ini_set('display_errors',1);
error_reporting(E_ALL);

//Controlador******************++++
//Recogemos valores:
$ocultarCampo = $_POST['hide'] ?? "none";
$submit ="";
$nombre ="";
$option ="";
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombreFichero'];
    $option = $_POST['option'];
    $submit = $_POST['submit'];
}

function imprime_bonito_post(){
    if ($_POST) {
        echo '<pre>';
        echo htmlspecialchars(print_r($_POST, true));
        echo '</pre>';
    }
}
imprime_bonito_post();

function imprime_directorio($direccion){
    $dir = scandir ($direccion);
    return $dir;
}
function obtener_ficheros($direccion){
    $ficheros = imprime_directorio($direccion);
    $arr_ficheros = [];
    foreach ($ficheros as $fichero){
        if(!is_dir($fichero)){
            array_push($arr_ficheros,$fichero);
        }
    }
    return $arr_ficheros;
}

//LECTURA ESCRITURA FICHEROS
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
    return file_get_contents($nombre);
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
    <title>Ejercicio 3 Ficheros</title>
</head>
<header>
    <h1>Leer de un directorio</h1>
</header>
<body>
<div class="container">
    <div class="jumbotron">
        <div>Un programa que nos muestre en un deplegable todos los ficheros del directorio actual</br>
            Alternativamente puedes tener una caja de texto para especificar el directorio</br>
            Al seleccionar uno de ellos y dar a mostrar se verá en contenido del fichero</br>
            <ul>
                <li>Debes leerlo línea a línea</li>
                <li>Para ver el contenido html usa la función htmlspecialchar</li>
                <li>Al seleccionar uno veremos su contenido (si tenemos permisos para verlos)</li>
            </ul>
        </div>
        <div style="background-color: lightpink">
            <form action="index.php" method="post">
                <div class="form-group">
                    Nombre del fichero:
                    <select class="form-control" name="nombreFichero">
                        <option value="" selected disabled hidden>Seleccione el fichero</option>
                        <?php
                        $array_ficheros = obtener_ficheros(__DIR__);
                            foreach($array_ficheros as $fichero){
                                echo '<option value="'.$fichero.'" name="nombreFichero" 
                                >'.$fichero.'</option>';
                            }
                        ?>
                        ?>>
                    </select>
                </div>
                <div class="form-group">
                    Directorio:<input type="text" class="form-control" value="" name="nombreDirectorio" placeholder=".">
                </div>
                <?php 
                if($submit == "Leer"){
                     echo '<div class="form-group">';
                     echo "Contenido del fichero ".$nombre;
                     echo '<textarea class="form-control" name="contenido" rows="3">'.leer_fichero($nombre).'</textarea>';
                     echo "</div>";
                }

                ?>
                <hr/>
                <div class="form-group row" id="boton">
                    <div class="row-sm-10" style="margin:15px;">
                        <input type="submit" class="btn btn-secondary" value="Leer" name="submit">
                    </div>
                </div>
                <input type="hidden" value="<?php echo $ocultarCampo?>" name="hide">

            </form>
            <hr/>
            <?php


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

