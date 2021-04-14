<?php
/**
 * @return int retorna un valor aleatorio de nota
 * Funciones creada para ser retrollamada en un array_map
 */
function asigna_notas(){
    return (rand(1,10));
}
function asigna_notas_0_5(){
    return (rand(0,5));
}



//Creo e inicalizo un array de 15 notas con el valor 0
$notas = array_fill(0,15,0);

//Asigna en cada posición una nota aleatoria
$notas = array_map('asigna_notas', $notas);

//Recorro el array para visualizarlo
$msj_notas="<h2>Contenido del primer array de notas </h2>";
foreach ($notas as $nota) {
    $msj_notas.="<h3>La nota actual es $nota</h3>";
}


//Creamos otro array de 15 elementos con notas entre 0 y 5
$notas_2=array_map('asigna_notas_0_5', array_fill(0,15,0));

//Juntamos los dos arrays en uno solo

$notas_total = $notas + $notas_2;
//Obtenemos valores de estadística
$max = max($notas_total);
$min = min($notas_total);
$media = array_sum($notas_total)/count($notas_total);

$msj_notas.="<h2>Recorriendo el array total con funcones de cursor</h2>";

//reinicio el puntero en el array al principio
reset($notas_total);//Me aseguro estar al principo
//Leo la primera nota
$nota = current($notas_total);

do{
    //Leemos el índice de esa posición
    $pos = key($notas_total);
    $msj_notas.="<h3>La nota de posicion $pos es $nota</h3>";
}while ($nota=next($notas_total)); //Hasta que no pueda avanzar en el array

//Buscamos el primer 10 en el array
$pos = array_search(10, $notas_total);
$msj_notas.= $pos !==FALSE ? "<h3>La nota de posicion $pos es $nota</h3>" : "<h3>No existe esa nota en el array</h3>";

$msj_notas.= in_array(11,$notas_total)? "<h3>Hay un 111 en el array</h3>" : "<h3>No existe un valor 11 en el array</h3>";

//Ordenamos el array en orden directo
sort($notas_total);
//Anoto el array ordenado
$msj_notas.="<h2>El array ordenado </h2>h2>";
foreach ($notas_total as $nota)
    $msj_notas.="<h3>La nota actual es $nota</h3>";

//Ordenamos el array en orden inverso
rsort($notas_total);
//Anoto el array ordenado
$msj_notas.="<h2>El array ordenado en orden inverso </h2>h2>";
foreach ($notas_total as $nota)
    $msj_notas.="<h3>La nota actual es $nota</h3>";
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
<?=$msj_notas?>
</body>
</html>