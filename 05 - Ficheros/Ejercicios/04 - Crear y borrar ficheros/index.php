<?php

include('../../../../000 - Mis plantillas/02 - Functions/utiles.php');
/*ver_errores();
imprime_bonito_post();*/
//Inicializamos las variables que vamos a necesitar:
$directorio = "ficheros";
$prefijo = "TMP";
$num_ficheros = 0;
$nombre_fichero = "";

//Ruteo
$opcion = $_POST['submit'] ?? "Empezar";
switch ($opcion){
    case "Empezar":
        $num_ficheros = sizeof(obtener_ficheros($directorio));

        break;
    case "borrar_todos":
        borrado_recursivo_ficheros($directorio,false);
        $num_ficheros = sizeof(obtener_ficheros($directorio));
        break;
    case "crear":
        //Creamos los 20 ficheros:
        for($i=0;$i<20;$i++){
            $name = tempnam($directorio,$prefijo);
            if($name == false){
                echo "Error creando el fichero numero:".($i+1)."<br/>";
            }
        }
        $num_ficheros = sizeof(obtener_ficheros($directorio));
        break;
    case "borrar_seleccionado":
        $num_ficheros = sizeof(obtener_ficheros($directorio));
        if(isset($_POST['fichero'])){
            $nombre_fichero = $_POST['fichero'];
        }
        if($nombre_fichero != "" && $nombre_fichero != "Selecciona un fichero para borrar"){
            eliminar_fichero_por_nombre($directorio,$nombre_fichero);
        }
        $num_ficheros = sizeof(obtener_ficheros($directorio));
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
   <!-- <link rel="stylesheet" href="/css/style.css">-->
    <title>Ejercicio 4</title>
</head>
<header>
    <h1>Crear y borrar ficheros</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Trabajaremos sobre un directorio llamado ficheros de nuestro proyecto</p>
        <p>mostraremos un desplegable con todos los ficheros</p>
        <p>Crear ficheros creará 20 ficheros aleatorios en esa carpeta usa la función tempnam(...)</p>
        <p>Borrar ficheros borrará todos los ficheros de ese directorio usa la función unlink(...)</p>
        <p>Borrar fichero seleccionado eliminará el fichero que seleccionemos</p>
        <pre>
            $name tempnam($directorio,$prefijo);
            $directorio es el directorio dónde se creará el fichero aleatorio
            $prefijo es un string que se pondrá delante del nombre aleatorio generado
            $name es el nombre del fichero que se ha creado (false si no se ha podido crear)
        </pre>
        <div style="background-color: white">
            <!--FORMULARIO-->
            <form action="index.php" method="POST">
            <div class="form-group">
                <div class="col">
                    <div class="nombre_fihero">
                        <label for="formFile" class="form-label">Nombre del archivo</label>
                        <select class="form-select" id="fichero" name="fichero">
                            <option selected>Selecciona un fichero para borrar</option>
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
                    <hr/>
                    <div class="texto_explicativo">
                        <ol>
                            <li><span style="color: darkred">Crear 20 ficheros</span></li>
                                <ul><li>Creará 20 ficheros vacíos con nombres aleatorios en una subcarpeta
                                    del proyecto llamado ficheros</li></ul>
                            <li><span style="color: darkred">Borrar ficheros</span></li>
                            <ul><li>Borrará todos los ficheros del directorio ficheros</li></ul>
                            <li><span style="color: darkred">Elimina fichero seleccionado</span></li>
                            <ul><li>Borrará el fichero de la lista que se haya seleccionado</li></ul>
                        </ol>
                    </div>
                </div>
                <div class="btn-group" role="group" style="margin-left: 50px;">
                    <button style="margin: 5px;" name="submit" value="borrar_todos" type="submit" class="btn btn-danger">Borrar ficheros</button>
                    <button style="margin: 5px;" name="submit" value="crear" type="submit" class="btn btn-success">Crear 20 ficheros</button>
                    <button style="margin: 5px;" name="submit" value="borrar_seleccionado" type="submit" class="btn btn-dark">Eliminar fichero seleccionado</button>
                </div>
            </div>
                <div class="alert alert-info" role="alert"">
                    <?php if ($num_ficheros == 1){ ?>
                        <subtitle>Hay <?php echo $num_ficheros ?> Fichero</subtitle>
                    <?php }else{ ?>
                        <subtitle>Hay <?php echo $num_ficheros ?> Ficheros en el directorio <?php echo $directorio ?></subtitle>
                    <?php }?>
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
