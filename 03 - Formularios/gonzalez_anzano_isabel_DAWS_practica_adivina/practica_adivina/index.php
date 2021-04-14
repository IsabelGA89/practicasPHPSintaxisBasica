<?php
//Codificación de errores:
/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

//variables para dejar seleccionado el radio de la opción de juego seleccionada:
$checked = null;
$checked_1 = null;
$checked_2 = null;
$checked_3 = null;

//Establecemos una opción por defecto, nada más entrar en la página
if(!empty($_GET['intentos'])){
    $checked = filter_input(INPUT_GET,'intentos');
}else{
    $checked = filter_input(INPUT_POST, 'intentos') ?? "10";
}

//Establezco los valores de las variables según la opcion de juego selecionada
switch ($checked) {
    case "10" :
        $checked_1 = "checked";
        break;
    case "16" :
        $checked_2 = "checked";
        break;
    case "20":
        $checked_3 = "checked";
        break;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="icon.png">
    <meta name="viewport"
    <title style="text-align: center">Adivina n&uacutemero</title>
    <link rel="stylesheet" href="estilo.css" type="text/css"/>
</head>
<body>


<fieldset style="width: 50%;float:left;margin-left: 20%; background: #FF00566E">
    <legend><h1>Juego adivina n&uacutemero</h1></legend>
    <h2> Selecciona un intérvalo del men&uacute de abajo</h2>
    <fieldset>
        <legend>Establece intérvalo</legend>
        <form action="jugar.php" method="POST">
            <input type="radio" name="intentos" value=10 <?php echo $checked_1 ?>> 1-1.024(2<sup>10</sup>). 10 intentos<br/>
            <input type="radio" name="intentos" value=16 <?php echo $checked_2 ?>> 1-65.536(2<sup>16</sup>). 16 intentos<br/>
            <input type="radio" name="intentos" value=20 <?php echo $checked_3 ?>> 1-1.048.536(2<sup>20</sup>). 20 intentos<br/>
            <input type="submit" value="Empezar" name="submit">
        </form>
    </fieldset>
    <br/>
    <h2> Piensa un n&uacutemero de ese intérvalo</h2>
    <h2> La aplicaci&oacuten lo acertar&aacute en el n&uacutemero de intentos establecidos seg&uacuten el intervalo</h2>
    <hr/>

    <h2> Cada vez que la aplicaci&oacuten te especifique un n&uacutemero deber&aacutes de indicar</h2>
    <ul>
        <ol>Si el n&uacutemero buscado es mayor</ol>
        <ol>Si el n&uacutemero buscado es menor</ol>
        <ol>Si has aceertado el n&uacutemero</ol>
    </ul>


</fieldset>
</body>
</html>