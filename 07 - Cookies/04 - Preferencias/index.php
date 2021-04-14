<?php
if (isset($_POST['submit'])){
    // Guardamos la información en la cookies
    $idioma=$_POST['idioma'];
    $perfilPublico=$_POST['perfilPublico'];
    $zonaHoraria=$_POST['zonaHoraria'];
    setcookie('idioma', $idioma, time()+24*60*60);
    setcookie('perfilPublico', $perfilPublico, time()+24*60*60);
    setcookie('zonaHoraria', $zonaHoraria, time()+24*60*60);
    $mensaje = "Información guardada en la sesión.";
}

function crea_options($valores, $seleccionado){
    foreach($valores as $valor){
        if($valor == $seleccionado)
            echo "<option selected='selected'>" . $valor . "</option>";
        else echo "<option>" . $valor . "</option>";
    }
}

$idiomas = array('español', 'inglés', 'francés');
$sino = array('sí', 'no');
$zonas_horarias = array('GMT-2', 'GMT-1', 'GMT', 'GMT+1', 'GMT+2');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preferencias</title>
    <link href="tarea.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id='login'>
    <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
        <fieldset>
            <legend>Preferencias</legend>
            <!-- Recuperamos la información de la sesión -->
            <div class='campo'>
                <label class='etiqueta' for='idioma'>Idioma:</label><br/>
                <select name='idioma' id='idioma'>
                    <?php crea_options($idiomas, $_SESSION['idioma']); ?>
                </select>
            </div>
            <div class='campo'>
                <label class='etiqueta' for='perfpublico'>Perfil público:</label><br/>
                <select name='perfilPublico' id='perfpublico'>
                    <?php crea_options($sino, $_SESSION['perfpublico']); ?>
                </select>
            </div>
            <div class='campo'>
                <label class='etiqueta' for='zonahoraria'>Zona horaria:</label><br/>
                <select name='zonaHoraria' id='zonahoraria'>
                    <?php crea_options($zonas_horarias, $_SESSION['zonahoraria']); ?>
                </select>
            </div>
            <div> <br/>
            </div>
            <div class='campo'> <input type='submit' name='submit' value='Establecer preferencias' /> </div>
            <div class='campo'> <a href="mostrar.php">Mostrar preferencias</a> </div>
        </fieldset>
    </form>
</div>
</body>
</html>