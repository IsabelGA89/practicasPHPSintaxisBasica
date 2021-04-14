<?php
//Controlador
$numero = $_POST['numero'];

if (!is_numeric($numero)) {
    $error="<h1>El valor <span style='color:red'>$numero</span> no es numérico, se mostrará la tabla del 0</h1>";
    $numero = 0;
}

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
    <link rel="stylesheet" href="estilo.css?v=<?=time();?>">
    <title>tabla multiplicar</title>
</head>
<body>
<?php if (isset($error))
    echo $error
?>
<table>
    <caption style="color:#0000e6;size:1.2em">Tabla del <?=$numero?></caption>
    <tr>
        <th>Valor</th>
        <th></th>
        <th>Número</th>
        <th></th>
        <th>Resultado</th>

    </tr>
    <?=$tabla?>

</table>
<form action="index.php" method="POST">
    <input type="submit" value="Volver al index">
</form>

</body>
</html>
