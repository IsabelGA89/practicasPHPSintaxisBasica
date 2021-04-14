<?php
require "Menu.php";

?>

<html>
<head>
    <title></title>
</head>
<body>

<?php
//instanciamos menu1
$menu1=new Menu();
//guardamos cada enlace mediante el método
//cargarOpcion
$menu1->cargarOpcion('http://entreunosyceros.hol.es','entreunosyceros');
$menu1->cargarOpcion('http://about.me/sapoclay','About SapoClay');
$menu1->cargarOpcion('http://sapobuskedas.hol.es','SapoBuskedas');

//Mostramos los menús
$menu1->mostrarVertical();
echo "<hr>";
$menu1->mostrarHorizontal();
?>
</body>
</html>