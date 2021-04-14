<?php
$clicks=[];
if(isset($_POST['submit'])){
    $nombre = filter_input(INPUT_POST,'nombre');
    $clicks = $_POST['clicks'];
    $clicks[$nombre] ++;

    $msj = "<h3>Has realizado  $clicks[$nombre] clicks</h3>";
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
<form action="tutoria.php" method="post">
    <?= $msj ?>
        Nombre <input type="text">
    <input type="submit" value="click" name="submit">
    <?php
    foreach($clicks as $nombre =>$accesos){
        echo "<input> type ='hidden' name='clicks[$nombre]' value='$accesos' /> \n";
    }

    ?>
</form>
</body>
</html>
