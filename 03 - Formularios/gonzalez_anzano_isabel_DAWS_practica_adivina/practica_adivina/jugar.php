<?php
//Identificamos las variables que necesitaremos
$max = 0;
$min = 0;
$numero_a_evaluar = 0;
$max_num_jugada = 0;
$num_jugada_actual = 0;
$acierto = "false";
$img_src = "";


//Inicializa las que vamos a obtener siempre su valor
if(isset($_POST['$num_jugada'])){
    $num_jugada = $_POST['$num_jugada'];
}else{
    $num_jugada = 1;
}

function get_img_src($last_id_img){
    $id_img = random_int(0, 20);
        if($id_img == $last_id_img){
            $id_img = random_int(0, 20);
        }
   $img_src = "./carrousel_strawberry/".$id_img.".png";

   return $img_src;
}


$variante_juego = filter_input(INPUT_POST, 'intentos');
switch ($variante_juego) {
    case "10" :
        $min = 1;
        $max = 1024;
        $max_num_jugada = 10;
        break;
    case "16" :
        $min = 1;
        $max = 65536;
        $max_num_jugada = 16;
        break;
    case "20":
        $min = 1;
        $max = 1048536;
        $max_num_jugada = 20;
        break;
}

//Ahora leemos la opción que nos ha traído aquí
$opcion = $_POST['submit'] ?? null;
//Este es un modo de controlar el routeo es decir, qué evento a solicitado este recurso
switch ($opcion){
    case "Empezar"://inicializar los valores
    //Acciones si vengo del index y empiezo la jugada
        $min = 1;
        $max = pow(2,(int)$variante_juego);
        $numero_a_evaluar = intdiv($max, 2);
        $max_num_jugada = $variante_juego;
        $intentos_totales = $max_num_jugada -1;
        break;
    case "Jugar":
    //Acciones si he presionado jugar
        $num_jugada=++$_POST['num_jugada'];
        $intentos_totales=$max_num_jugada-$num_jugada;

        $numero_a_evaluar = filter_input(INPUT_POST, 'num_a_evaluar');
        $max = filter_input(INPUT_POST, 'max');
        $min = filter_input(INPUT_POST, 'min');
        $rtdo = filter_input(INPUT_POST, 'rtdo');

        if($num_jugada < $max_num_jugada){
            switch ($rtdo) {
                case '>':
                    $min = $numero_a_evaluar;
                    break;
                case '<':
                    $max = $numero_a_evaluar;
                    break;
                case '=':
                    header("Location:fin.php?jugada=".$num_jugada."&acierto=true");
                    exit();
                    break;
            }
             $numero_a_evaluar = intdiv(($max - $min), 2) + $min;

        }else{
            header("Location:fin.php?jugada=".$num_jugada."&acierto=false");
            exit();
        }
    break;
    case "Reiniciar":
    //Acciones si he presionado Reiniciar
        $min = 1;
        $max = pow(2, (int)$variante_juego);
        $numero_a_evaluar = intdiv($max, 2);
        $max_num_jugada = $variante_juego;
        $intentos_totales = $max_num_jugada -1;
        $acierto = "false";
        break;

    case "Volver":
    //Acciones si he presionado volver
     header("Location:index.php?intentos=".$variante_juego);
     exit();

    default:
    //Acciones por defecto - Devolvemos al index.php
        header("Location:index.php");
        exit();
}

//Si hay variables que acutalizo la pongo aquí en cualquier caso, las debería de poner aquí


?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de adivina un número</title>
    <link rel="shortcut icon" href="icon.png">
</head>
<body style="width: 60%;float:left;margin-left: 20%; ">

<h3></h3>
<fieldset style="width:40%;background:#FF00566E ">
    <legend>Empieza el juego</legend>
    <form action="jugar.php" method="POST" >
        <h2> El n&uacutemero es  <span style="color: #952369"> <?php echo $numero_a_evaluar ?></span> </h2>
        <h5> Jugada  actual nº <span style="color: #952369"> <?php echo $num_jugada; ?></span> Te quedan <span style="color: #952369"> <?php echo $intentos_totales; ?></span> intentos </h5>

        <input type="hidden" value="<?php echo $variante_juego ?>" name="intentos">
        <input type="hidden" value="<?php echo $num_jugada  ?>" name="num_jugada">
        <input type="hidden" value="<?php echo $numero_a_evaluar ?>" name="num_a_evaluar">

        <input type="hidden" value="<?php echo $max ?>" name="max">
        <input type="hidden" value="<?php echo $min ?>" name="min">

        <input type="hidden" value="<?php echo $intentos_totales ?>" name="intentos_totales">
        <input type="hidden" value="<?php echo $acierto ?>" name="acierto">

        <fieldset>
            <legend>Indica c&oacutemo es el n&uacutemero qu&eacute has pensado</legend>
            <input type="radio" name="rtdo" checked value='>'> Mayor<br />
            <input type="radio" name="rtdo" value='<'> Menor<br />
            <input type="radio" name="rtdo" value='='> Igual<br />
        </fieldset>
        <hr />
        <div class="thumb">
            <img class="img_carrousel" src="<?php echo get_img_src($img_src) ?? "./carrousel_strawberry/10.png"; ?>">
        </div>

        <input type="submit" value="Jugar" name="submit">
        <input type="submit" value="Reiniciar" name="submit" >
        <input type="submit" value="Volver" name="submit" >
   <!--<input type="button" value="Volver" name="submit" onclick="history.back()" > Con esto imitamos la nav de las flechas  <- -> -->

    </form>
</fieldset>

</body>
</html>