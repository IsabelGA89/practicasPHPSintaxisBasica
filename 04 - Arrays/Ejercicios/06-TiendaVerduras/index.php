<?php
//Codificación de errores:
ini_set('display_errors',1);
error_reporting(E_ALL);

$productos = [
    'lechuga' => ['unidades' => 200,
        'precio' => 0.90],
    'tomates' =>['unidades' => 2000,
        'precio' => 2.15],
    'cebollas' =>['unidades' => 3200,
        'precio' => 0.49],
    'fresas' =>['unidades' => 4800,
        'precio' => 4.50],
    'manzanas' =>['unidades' => 2500,
        'precio' => 2.10],
];
$form_comprar = "";
//Recorremos el array y creamos el formulario
foreach ($productos as $producto => $datos) {
    $form_comprar .= ucfirst($producto) . "<input type='text' name='$producto' value='"
        .($_POST[$producto] ?? rand(1, $datos['unidades'])) . "' /><br />\n";
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport">
    <META HTTP-EQUIV=Refresh CONTENT="5; URL=index.php">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 6</title>
</head>
<header>
    <h1>Ejercicio 6 - Tienda de Verduras</h1>
</header>
<body>
<div class="container">

    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Dada una tienda de verduras con los siguientes productos<br/></p>
        <pre>
            $productos = [
                'lechuga' => ['unidades' => 200,
                                'precio' => 0.90],
                'tomates' =>['unidades' => 2000,
                                'precio' => 2.15],
                'cebollas' =>['unidades' => 3200,
                                'precio' => 0.49],
                'fresas' =>['unidades' => 4800,
                                'precio' => 4.50],
                'manzanas' =>['unidades' => 2500,
                            'precio' => 2.10],
            ];
        </pre>
        <ul>
            <li>Realiza una aplicación con un formulario para poder comprar productos</li>
            <li>Tras la compra se visualizará la factura del producto siempre que haya unidades</li>
            <li>Se mostrará las unidades que quedan de cada producto</li>
        </ul>

        <div style="background-color: lightpink">

            <fieldset style="width: 30 %;margin:40px;background:bisque; font - size:2em">
                <legend>Productos a comprar</legend>
                <form action="index.php" method="POST">
                    <?= $form_comprar ?>
                    <input type="submit" value="Comprar" value="10" name="comprar">
                </form>
            </fieldset>

        </div>
    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- Footer -->
