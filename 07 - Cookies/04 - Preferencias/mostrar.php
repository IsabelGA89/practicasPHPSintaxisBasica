<?php

//Si he presionado borrar
if (isset($_POST['submit'])) {

    setcookie('idioma', "", time() - 1);
    setcookie('perfilPublico', "", time() - 1);
    setcookie('zonaHoraria', "", time() - 1);
    header("location:index.php?$msj=las cookies han sido borradas");
}
$mensaje = "";
$idioma = $_COOKIE['idioma'];
$perfpublico = $_COOKIE['perfilPublico'];
$zonahoraria = $_COOKIE['zonaHoraria'];
// Comprobamos si ya se ha enviado el formulario
?>
<body>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies </title>
    <link href="tarea.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id='login'>
    <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
        <fieldset>
            <legend>Preferencias</legend>
            <div>
						<span class='mensaje'>
							<?php echo $mensaje; ?>
						</span>
            </div>
            <!-- Recuperamos la información de la sesión -->
            <div class='campo'>
                <label class='etiqueta'>Idioma:</label><br/>
                <label class='texto'>
                    <?php
                    echo $idioma;
                    ?>
                </label>
            </div>
            <div class='campo'>
                <label class='etiqueta'>Perfil público:</label><br/>
                <label class='texto'>
                    <?php
                    echo $perfpublico;
                    ?>
                </label>
            </div>
            <div class='campo'>
                <label class='etiqueta'>Zona horaria:</label><br/>
                <label class='texto'>
                    <?php
                    echo $zonahoraria;
                    ?>
                </label>
            </div>
            <div>
                <br/>
            </div>
            <div class='campo'>
                <input type='submit' name='submit' value='Borrar preferencias'/>
                <div class='campo'> <a href="index.php">Volver al index</a> </div>

            </div>

        </fieldset>
    </form>
</div>
</body>
</html>
