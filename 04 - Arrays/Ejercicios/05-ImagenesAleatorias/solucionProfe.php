<?php
$imagenes = [
    "https://es.wikieducator.org/images/3/3d/Ajax_cliente_servidor.png",

    "https://es.wikieducator.org/images/7/7b/Funcionamiento_ajax.png",
    "https://es.wikieducator.org/images/a/aa/Angular_app_base.png",
    "https://es.wikieducator.org/images/3/3d/Docker_distancia_1.png",

    "https://es.wikieducator.org/images/4/4e/Opcion_Instalar.png",
    "https://es.wikieducator.org/images/a/ab/AplicacionWeb.png",
    "https://es.wikieducator.org/images/e/e4/Red3.png",
    "https://es.wikieducator.org/images/f/f2/DACTW.png",
    "https://es.wikieducator.org/images/e/e5/M3_web.png",
    "https://es.wikieducator.org/images/a/a6/Ficheros.jpeg"];

//Debo de tomar 3 imágenes pero que no se repitan
$i1 = rand(0, count($imagenes) - 1);
do {
    $i2 = rand(0, count($imagenes) - 1);
} while ($i2 == $i1);
do {
    $i3 = rand(0, count($imagenes) - 1);
} while (($i3 == $i1) or ($i3 == $i2));

/* Alternativamente puedo usar la función siguiente
  //$indices = array_rand($imagenes, 3);
   $i1 = $inidices[0];
   $i2 = $inidices[1];
   $i3 = $inidices[2];
 *
 */
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV=Refresh CONTENT='2; URL=index.php'>
    <title></title>
</head>
<body>
<fieldset>
    <?php
    /**
     * En caso de haber usado la función
     * Debo recoger los índices
     */
    //$i1 = $indices[0];
    //$i2 = $indices[1];
    //$i3 = $indices[2];
    echo "<img width='300' height='300' src='$imagenes[$i1]' alt='imagen 1'>";
    echo "<img width='300' height='300' src='$imagenes[$i3]' alt='imagen 2'>";
    echo "<img width='300' height='300' src='$imagenes[$i2]' alt='imagen 3'>";
    ?>

</fieldset>
</body>
</html>
