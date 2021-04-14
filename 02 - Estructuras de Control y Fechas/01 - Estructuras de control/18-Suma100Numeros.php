<?php
//Se plantea y decide que los 100 primeros números naturalesa
//Van del 0 al 99 Decidir esto es análisis ...

$total =0; //Así evito un warning en la primera iteración.
for ($numero=0; $numero<100; $numero++){
    $total+=$numero;
    $msj.="<h4 >Esta es la iteracion <span style='color:#0000b3'>".($numero+1)."ª</span> con subtotal <span style='color:#0000b3'>$total</span></h4>";
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
<h2>El valor total de la suma <span style="color:#532F8C"><?=$total?></span></h2>
<?=$msj ?>


</body>
</html>
