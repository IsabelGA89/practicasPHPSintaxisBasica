<?php
require "Empleado.php";

$e1 = new Empleado("Isabel",2000);
$e2 = new Empleado("Pepa",1500);
$e3 = new Empleado("Cristina",5000);
$e4 = new Empleado("Julian",10000);

echo $e1->imprime_datos();
echo $e2->imprime_datos();
echo $e3->imprime_datos();
echo $e4->imprime_datos();
