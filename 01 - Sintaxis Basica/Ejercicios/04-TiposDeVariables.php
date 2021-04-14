<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probando echo</title>
</head>
<body>
<h1>Declaraciones de valores enteros</h1>
<?php
//Declarando un valor entero
$a = 10;
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor entero con formato binario
$a = 0b1110;
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor float
$a = 1234.3456;
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor float con notación científica
$a = 2E9; // es como 2 *10⁹
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor booleano
$a = true;
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor cadena de caracteres
$a = "Una cadena de caracteres";
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";
//Declarando un valor null
$a = null;
echo "Valor de la variable \$a es <span style='color:#B01302'>$a</span> y es de tipo ".gettype($a)."<br />";



?>


</body>
</html>
