<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 01/11/20
 * Time: 05:30
 */

//Establecemos un idioma por defecto
//Por si vengo de la página sitio.php leería el idioma por GET
$idioma = $_GET['idioma'] ?? "castellano";

//Estas variables son para dejar seleccionado el radio del idioma
$checked_f = null;
$checked_i = null;
$checked_c = null;

//Si he presionado el submit de esta página leo el idioma establecido
if (isset($_POST['submit'])) {
    $idioma = $_POST[idioma];
}

//Establezco los valores de las variables según el idioma selecionado
switch ($idioma) {
    case 'frances':
        $titulo_idioma = "Selectionnez la langue";
        $titulo_datos = "Accéder aux données";
        $idioma_f = "Français";
        $idioma_e = "Espagnol";
        $idioma_i = "Anglais";
        $user = "Entrez votre nom";
        $submit_datos = "Accès";
        $submit_idioma = "Sélectioner";
        $checked_f = "checked";

        break;
    case 'ingles':
        $titulo_idioma = "Select a Language";
        $titulo_datos = "Access data";
        $idioma_f = "France";
        $idioma_e = "Spain";
        $idioma_i = "English";
        $user = "Enter your name";
        $submit_datos = "Access";
        $submit_idioma = "Select";
        $checked_i = "checked";
        break;
    case 'castellano':
        $titulo_idioma = "Selecciona el idioma";
        $titulo_datos = "Datos de acceso";
        $idioma_f = "Francés";
        $idioma_e = "Español";
        $idioma_i = "Inglés";
        $user = "Inserta tu nombre";
        $submit_datos = "Acceder";
        $submit_idioma = "Selecionar";
        $checked_c = "checked";
        break;
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset>
    <form action="index.php" method="post">

        <legend><?php echo $titulo_idioma ?></legend>
        <input type="radio" name="idioma" <?php echo $checked_f ?> value="frances"><?php echo $idioma_f ?><br/>
        <input type="radio" name="idioma" <?php echo $checked_i ?> value="ingles"><?php echo $idioma_i ?><br/>
        <input type="radio" name="idioma" <?php echo $checked_c ?> value="castellano"><?php echo $idioma_e ?><br/>
        <input type="submit" name="submit" value="<?php echo $submit_idioma ?>">
    </form>
</fieldset>


<form action="sitio.php" method="post">
    <fieldset>
        <legend><?php echo $titulo_datos ?></legend>
        <?php echo $user ?><input type="text" name="nombre">
        <input type="submit" value="<?php echo $submit_datos ?>">
        <input type="hidden" name=idioma value="<?php echo $idioma ?>">
    </fieldset>
</form>

</body>
</html>
