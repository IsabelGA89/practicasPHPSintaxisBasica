<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Leemos las dimensiones (alturas y anchuras)
$hh = $_POST['hh']; //Altura de la cabecera
$hm = $_POST['hm']; //Altura del menu
$wm = $_POST['wm']; //Anchura del menu
$wc = $_POST['wc']; //Anchura de contenido
$hc = $hm;
//
//
//Leemos los colores
$ch = $_POST['ch']; //
$cm = $_POST['cm']; //
$cc = $_POST['cc']; //
//Leemos los datos del título
$titulo = $_POST['titulo'];
$size = $_POST['size'];
$wh = $wm + $wc;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST" >
    <input type="submit" value="Volver al index">
</form>
<hr />
<?php
//cabecera
echo "<header style= 'height:$hh" . "px;width:$wh" . "px;background:$ch'><span style=font-size:$size" . "px>$titulo</></header>";
//menu
echo "<div style= 'height:$hm" . "px;width:$wm" . "px;background:$cm;float:left'>Menu</div>";
//contenido
echo "<div style= 'height:$hc" . "px;width:$wc" . "px;background:$cc;float:left'>Contenido</div>";
?>

</body>
</html>

