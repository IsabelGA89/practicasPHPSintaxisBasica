<?php
ini_set("display_errors", true);
error_reporting(E_ALL);

require_once "funciones.php";

/*imprime_bonito_post();*/

$msj = isset( $_GET[ 'msj' ] ) ? $_GET[ 'msj' ] : null;
//Inicilizo variables
$user = "";
$pass = "";

$checked = null;
$checked_1 = null;
$checked_2 = null;
$checked_3 = null;

$opcion = $_POST['submit'] ?? null;

//Establecemos una opción por defecto, nada más entrar en la página para el idioma castellano
if(!empty($_GET['idioma'])){
    $checked = filter_input(INPUT_GET,'idioma');
    $idioma = $_GET['idioma'];
}else{
    $checked = filter_input(INPUT_POST, 'idioma') ?? "castellano";
    $idioma = $_POST['idioma'] ?? "castellano";
}

//Establezco los valores de las variables del radio según la opcion de idioma selecionada
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

if(isset($_POST)){
    $user = $_POST['user'] ?? "";
    $pass = $_POST['pass'] ?? "";
}

//Idioma
asigna_idioma($idioma);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>

<h1> <?php echo gettext("TITULO")?></h1>


<fieldset class="idioma">

    <form action="index.php" method="post">
        <legend><?php echo gettext("SELECCIONA_IDIOMA")?></legend>
        <input type="radio" <?php echo $checked_1 ?> name="idioma" value="frances"><?php echo gettext("FRANCES") ?><br/>
        <input type="radio" <?php echo $checked_2 ?> name="idioma" value="ingles"><?php echo gettext("INGLES") ?><br/>
        <input type="radio" name="idioma"  <?php echo $checked_3 ?> value="castellano"><?php echo gettext("CASTELLANO") ?>
        <input type="submit" style='float:right' name="submit" value="<?php echo gettext("BTN_IDIOMA") ?>">
    </form>
</fieldset>
<hr style='margin-top:50px' />
<?php if($msj){
    echo  "<div class='error'>".gettext($msj)."</div>";
    echo "<hr/>";
}?>
<form action="sitio.php" method="post">
    <fieldset class="login">
        <legend><?php echo gettext("LOGIN") ?></legend>
        <label for="user"><?php echo gettext("USUARIO") ?></label><input type="text" name="user" value="<?php echo $user ?>"><br />
        <label for="pass"><?php echo gettext("PASSWORD") ?></label><input type="text" name="pass" value="<?php echo $pass ?>">
        <input type="hidden" value="<?php echo $idioma ?>" name="idioma">
        <input type="submit" value="<?php echo gettext("BTN_ACCEDER") ?>">
    </fieldset>
</form>

</body>
</html>
