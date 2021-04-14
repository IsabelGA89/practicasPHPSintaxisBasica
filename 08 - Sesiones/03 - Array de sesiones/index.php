<?php
$tirada = null;
session_start();


/**
 * @param int $tirada1
 * @param int $tirada2
 * @param $jugada
 */
function realiza_jugada(int $tirada1, int $tirada2): array
{
    $resultado = $tirada1 == $tirada2 || $tirada1 + $tirada2 < 5;
    $jugada['tirada1'] = $tirada1;
    $jugada['tirada2'] = $tirada2;
    $jugada['resultado'] = $resultado;
    return $jugada;
}

function mostrar_jugadas()
{
    $jugadas = $_SESSION['jugadas'];
    $html = "";
    $jugadasGanadas = 0;
    foreach ($jugadas as $jugada => $resultado) {
        $html .= "<h3>Jugada número ". ($jugada+1) ."</h3>";
        $html .= "Tirada 1:<span 'style=color:red'> {$resultado['tirada1']}</span><br />";
        $html .= "Tirada 2:<span 'style=color:red'> {$resultado['tirada2']}</span><br />";
        $resultado = $resultado['resultado'] ? "ganado" : "perdido";
        if ($resultado == "ganado")
            $jugadasGanadas++;
        $html .= "En esta jugada has $resultado <br />";
        $html .= "<hr />";
    }
    return "<h1>En total has gadado $jugadasGanadas<h1> " . $html;

}

$html_jugadas = "Presiones jugar para empezar una nueva jugada ";
if (isset($_POST['submit'])) {
    $jugadas = $_SESSION['jugadas'] ?? [];
    $tirada = sizeof($jugadas);
    $tirada++;
    $tirada1 = rand(1, 6);
    $tirada2 = rand(1, 6);
    $jugada = realiza_jugada($tirada1, $tirada2);
    $_SESSION['jugadas'][] = $jugada;
    if ($tirada == 10) {
        $html_jugadas = "<h3>Resultado del juego</h3>";

        $html_jugadas .= mostrar_jugadas();
        session_destroy();

    } else {
        $html_jugadas = "Tirada actual $tirada<br /><ul>";
        $html_jugadas .= "<li>Tirada 1 obtenido {$jugada['tirada1']}</li>";
        $html_jugadas .= "<li>Tirada 2 obtenido {$jugada['tirada2']}</li>";
        $resultado = $jugada['resultado'] ? "ganado" : "perdido";
        $html_jugadas .= "<li>En esta jugada has $resultado</li>";
        $html_jugadas .= "</ul>";
    }
} else
    session_destroy();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="http://manuel.infenlaces.com/distancia/dwes/ejercicios/05_T5_Sesiones/02_T5_Sesiones_accesos_fechas/estilo.css">

    <title>Juego datos</title>
</head>
<body>
<fieldset>

    <legend>Información del juego</legend>
    <h3>Juego de 10 tiradas de dados</h3>
    <?= $html_jugadas ?>

    <form action="index.php" method="POST">
        <input type="submit" value="jugar" name="submit">
    </form>
</body>
</html>
