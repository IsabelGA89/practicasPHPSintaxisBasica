<?php
ini_set("display_errors", true);
error_reporting(E_ALL);

require_once "funciones.php";

/*imprime_bonito_post();*/

$msj = isset( $_GET[ 'msj' ] ) ? $_GET[ 'msj' ] : null;
//Inicilizo variables
if(isset($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $idioma = $_POST['idioma'];
  /*  $opcion = $_POST['submit'];*/
}
//Idioma
asigna_idioma($idioma);

if ($user == "") {
    $text = 'Location:jugar.php?msj='.gettext("ERR_USER");
    header("$text&idioma=$idioma");
    exit();
}
if ($pass == "") {
    $text = 'Location:jugar.php?msj='.gettext("ERR_PASS");
    header("$text&idioma=$idioma");
    exit();
}

$checked = null;
$checked_1 = null;
$checked_2 = null;
$checked_3 = null;
//Establecemos una opción por defecto, nada más entrar en la página para el idioma castellano
if(!empty($_GET['idioma'])){
    $checked = filter_input(INPUT_GET,'idioma');
}else{
    $checked = filter_input(INPUT_POST, 'idioma') ?? "castellano";
}
//Establezco los valores de las variables según la opcion de idioma selecionada
switch ($checked) {
    case "frances" :
        $checked_1 = "checked";
        break;
    case "ingles" :
        $checked_2 = "checked";
        break;
    case "castellano":
        $checked_3 = "checked";
        break;
}

/*$idioma = $_POST['idioma'] ?? "castellano";*/




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">

</head>
<body>
<h1> <?php echo gettext("TITULO") ?></h1>

<fieldset class="idioma">
    <form action="sitio.php" method="post">
        <legend><?php echo gettext("SELECCIONA_IDIOMA")?></legend>
            <input type='radio' name='idioma' <?php echo $checked_1 ?>  value="frances"><?php echo gettext("FRANCES") ?><br/>
            <input type='radio' name='idioma' <?php echo $checked_2 ?>  value='ingles'><?php echo gettext("INGLES") ?><br/>
            <input type='radio' name='idioma' <?php echo $checked_3 ?>  value='castellano'><?php echo gettext("CASTELLANO") ?><br/>
        <input type="hidden" name ="user" value = '<?php echo $user?>' >
        <input type="hidden" name ="pass" value = '<?php echo $pass?>' >
            <input type='submit' style='float:right' name='submit' value='<?php echo gettext("BTN_IDIOMA") ?>'>
    </form>
</fieldset>
<hr style='margin-top:50px' />

<h2><?php echo gettext("BIENVENIDO")." $user" ?> </h2>

    <form action="index.php" method="post">

        <input type="submit" style='float:right' value="<?php echo gettext("BTN_VOLVER") ?> ">
        <input type="hidden" name ="idioma" value = '<?php echo $idioma?>' >


    </form>

</body>
</html>

