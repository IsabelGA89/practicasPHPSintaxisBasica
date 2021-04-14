<?php

//Creo el array con 5 países
//No establezco el índice y lo crea de forma automática
$paises[]="España";
$paises[]="Francia";
$paises[]="Portugal";
$paises[]="Rumanía";
$paises[]="Italia";
//Lo recorro de usando un for
$size = sizeof($paises);
for ($n=0; $n<$size; $n++){
    $msj_paises_index.= "<h3>Valor del elemento $n del array <span style='color: #ac1f5b'>{$paises[$n]}</span></h3>";
}

//Creo un array asociativo
$capitales ["España"]="Madrid";
$capitales ["Francia"]="París";
$capitales ["Portugal"]="Lisboa";
$capitales ["Rumania"]="Bucarest";
$capitales ["Italia"]="Roma";
//Lo recorro con foreach
foreach ($capitales  as $ciudad => $capital) {
    $msj_capitales.= "<h2>Capital de <span style='color: #ac1f5b'>$ciudad</span> es<span style='color: #3B5998'> $capital</span></h3>";

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
<h1>Listado de un array indexado de países</h1>
<?=$msj_paises_index?>
<h1>Listado de un array asociativo de capitales de países</h1>
<?=$msj_capitales?>
</body>
</html>
