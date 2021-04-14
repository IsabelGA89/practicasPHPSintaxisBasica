<?php
//Controlador
$numero = $_POST['numero'];

if (!is_numeric($numero))
    $numero=0;

for ($i=1; $i<=10; $i++){
    $rtdo = $numero*$i;
    $tabla.=<<<FIN
<tr>
   <td>$numero</td>
   <td>*</td>
   <td>$i</td>  
   <td>=</td>  
   <td>$rtdo</td>  
</tr>
FIN;

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
<h2>Tabla del <?=$numero?></h2>
<table>
    <tr>
        <th>Valor</th>
        <th>*</th>
        <th>Número</th>
        <th>=</th>
        <th>Resultado</th>

    </tr>
    <?=$tabla?>

</table>


</body>
</html>