<?php
//Codificación de errores:
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

//Creamos las variables que vamos a necesitar y las inicializamos si es necesario:
$array_contactos = [];
$num_contactos = 0;

$array_mensajes_de_error = [
    "nombre_vacio"=>"Debes facilitar un nombre para crear el contacto.",
    "telefono_numerico"=>"El teléfono debe ser numérico y el valor introducido no lo es.",
    "telefono_vacio"=> "Debe facilitar un teléfono para el contacto. El teléfono está vacío."
];
$hay_error = false;
$texto_error = "";
$mensaje_informativo ="";


//Funciones:
function obtener_mensaje_error($error_code,$array_mensajes_de_error){
    $error_mensaje = "";
    foreach ($array_mensajes_de_error as $index => $mensaje) {
        if($index == $error_code){
            $error_mensaje = $mensaje;
        }
    }
    return $error_mensaje;
}
function get_contacts_number($arr){
    $num = 0;
    if(is_array($arr)){
        $num = sizeof($arr);
    }
    return $num;
}
function nombre_vacio($nombre,$array_mensajes_de_error){
    //Validamos nombre:
   if(trim($nombre) < 0  ||  trim($nombre) == ""){
           $texto_error = obtener_mensaje_error('nombre_vacio',$array_mensajes_de_error);
           $hay_error = true;
    }else{
       $hay_error = false;
       $texto_error ="";
    }
        $arr_nombre = [$hay_error,$texto_error];
    return $arr_nombre;
}
function nombre_existe($nombre,$array_contactos){
    if(is_array($array_contactos) && array_key_exists($nombre,$array_contactos)){
        $nombreDuplicado = true;
    }else{$nombreDuplicado = false;}
    return $nombreDuplicado;
}
function telefono_numerico($telefono){
    if (is_numeric($telefono)) {
        return $telefono_es_numerico = true;
    } else {
        return $telefono_es_numerico = false;
    }
}
function telefono_vacio($telefono){
    $vacio = true;
    if(trim($telefono) < 0  || trim($telefono) === "" || $telefono = ""){
        $vacio = false;
    }
    return $vacio;
}
function comprobar_telefono($telefono,$array_mensajes_de_error){
    $telefono_tiene_contenido = telefono_vacio($telefono);
    $telefono_es_numerico = telefono_numerico($telefono);
    if(($telefono_tiene_contenido == true) && ($telefono_es_numerico == false)){
        $texto_error = obtener_mensaje_error('telefono_numerico',$array_mensajes_de_error);
        $hay_error = true;
    }else{
        $hay_error = false;
        $texto_error="";
    }
    $arr_telefono = [$hay_error,$texto_error];
    return $arr_telefono;
}

function guardar_en_agenda($nombre,$telefono,&$array_contactos,$nombre_duplicado){
    $array_contactos[$nombre] = $telefono;
    if($nombre_duplicado==false){
        $mensaje_informativo = "Nuevo contacto agregado a la agenda";
    }else{
        $mensaje_informativo = "Contacto actualizado";
    }
    return $mensaje_informativo;
}
function borrar_contacto($nombre,&$array_contactos){
    unset($array_contactos["$nombre"]);
    $mensaje_informativo = "Conctacto eliminado";
    return $mensaje_informativo;
}
//Ruteo:
$opcion = $_POST['submit'] ?? "Empezar";
switch ($opcion){
    case "Empezar":
        $num_contactos = get_contacts_number($array_contactos);
        break;
    case "Guardar":
        //Leemos los datos:
        if (isset($_POST['nombre'])){
            $nombre = ($_POST['nombre']);
            $array_contactos = $_POST['agenda'];
        }
        if(isset($_POST['telefono'])){
            $telefono = ($_POST['telefono']);
        }
        //Validacion nombre y telefono:

        $arr_nombre=nombre_vacio($nombre,$array_mensajes_de_error);
        if($arr_nombre[0]){
            $hay_error = $arr_nombre[0];
            $texto_error = $arr_nombre[1];
        }else{
            $arr_telefono = comprobar_telefono($telefono,$array_mensajes_de_error);
            if($arr_telefono[0]){
                $hay_error = $arr_telefono[0];
                $texto_error = $arr_telefono[1];
            }else{
                $nombre_duplicado = nombre_existe($nombre,$array_contactos);
                $telefono_vacio = telefono_vacio($telefono);
                if($nombre_duplicado == false && $telefono_vacio == true){
                    //No existe el contacto y hay que guardarlo:
                   $mensaje_informativo = guardar_en_agenda($nombre,$telefono,$array_contactos,$nombre_duplicado);
                }
                if($nombre_duplicado == false && $telefono_vacio==false){
                    $hay_error = true;
                    $texto_error = obtener_mensaje_error('telefono_vacio',$array_mensajes_de_error);
                }
                //Otras consideraciones:
                if($nombre_duplicado && $telefono_vacio == true){
                    $mensaje_informativo = guardar_en_agenda($nombre,$telefono,$array_contactos,$nombre_duplicado);
                }
                if($nombre_duplicado && $telefono_vacio == false){
                    $mensaje_informativo = borrar_contacto($nombre,$array_contactos);
                }
            }
            $num_contactos = get_contacts_number($array_contactos);
        }

        break;
    case "Borrar Todos":
        $num_contactos = 0;
        $array_contactos = [];
        header("Location:index.php");
        exit();
    default:
        header("Location:index.php");
        exit();
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Icon-->
    <link rel="icon" type="image/ico" sizes="32x32" href="./favicon.ico">

<title>Practica Agenda Telefónica</title>
</head>
<body>
<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<header style="text-align: center">
    <h1>Agenda Telefónica</h1>
</header>
<div class="contenido existentes">
    <h2>Contactos</h2>
    <div style="text-align: center">
        <?php if ($num_contactos == 1){ ?>
            <subtitle>Tienes <?php echo $num_contactos ?> contacto</subtitle>
        <?php }else{ ?>
            <subtitle>Tienes <?php echo $num_contactos ?> contactos</subtitle>
        <?php }?>
    </div>
    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Número</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(is_array($array_contactos) && sizeof($array_contactos) > 0){
            foreach ($array_contactos as $nombre => $telefono){
                echo "<tr>";
                echo  "<th>".$nombre."</th>";
                echo  "<th>".$telefono."</th>";
                echo "</tr>";
            }
        }else{
        echo "<tr>";
        echo  "<th> - </th>";
        echo  "<th> - </th>";
        echo "</tr>";
        } ?>
        </tbody>
    </table>
</div>
<div class="contenido jumbotron" style="background-color:#FCE4EC;">
    <h2>Nuevo Contacto</h2>
    <form action="index.php" method="post" class="form-inline" style="text-align: center">
        <div class="container-fluid">
            <fieldset style="background-color:lightgray;">
                <div class="campo">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" max="22">
                    </div>
                </div>
                <div class="campo">
                    <div class="form-group">
                        <label for="telefono">Numero</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Numero de Teléfono" maxlength="9">
                    </div>
                </div>
                <input type="submit" name="submit" value="Guardar" class="btn btn-primary">
                <input type="submit"  name="submit" value="Borrar Todos" class="btn btn-danger"
                       onclick="return confirm('¿Está seguro?')"
                    <? if(get_contacts_number($array_contactos)>0){echo "enabled";} else{ echo "disabled"; }?>>
            </fieldset>
            <?php
            echo "<hr/>";
            if($hay_error){

                echo "<div class='alert alert-danger' role='alert'>$texto_error</div>";
            }
            if($mensaje_informativo){
               echo "<div class='alert alert-info' role='alert'>$mensaje_informativo</div>";
            }
            ?>
        </div>

        <input type="hidden" value="<?php echo $opcion ?? "Empezar" ?>" name="opcion">
        <input type="hidden" value="<?php echo $num_contactos ?>" name="numContactos">
        <input type="hidden" value="<?php echo $texto_error ?>" name="texto_error">
        <input type="hidden" value="<?php echo $mensaje_informativo ?>" name="mensaje_informativo">

        <?php
        if(is_array($array_contactos)){
            foreach($array_contactos as $nombre_contacto => $telefono_contacto)
            {
                echo "<input type=hidden name='agenda[$nombre_contacto]' value ='$telefono_contacto'>";
            }
        }
        ?>

    </form>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</html>
