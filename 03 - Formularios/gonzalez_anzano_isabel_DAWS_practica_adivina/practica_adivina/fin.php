<?php
/**
 * Esta variable deberá de tener el valor de si he acertado
 * o si se ha excedido el número de intentos
 */
$msj = "";
$img_src = "";

if($_GET['jugada']){
    $num_jugada = $_GET['jugada'];
    $acierto = $_GET['acierto'];
}else{
    $num_jugada = $_POST['jugada'];
    $acierto = $_POST['acierto'];
}



if($acierto == "true"){
    $msj ="¡He acertado! Además en ".(int)$num_jugada." jugadas totales, ¿Soy genial o no?";
    $img_src ="./img/win.png";
}else{
    $msj ="Parece que alguien no ha sido sincero...<br/>";
    $img_src = "./img/dead.png";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="estilo.css" type="text/css"/>
</head>
<body>
<fieldset>
    <legend>Fin del juego</legend>
    <form action="index.php" method="POST">
        <?php echo "<h2>$msj</h2>";?>
        <img class="img_win_or_dead" src="<?php echo $img_src ?>">
        <input type="submit" value="Volver a Inicio">
    </form>

</fieldset>


</body>
</html>