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
<fieldset>
    <legend>Inserta valor</legend>
    <form action="tabla.php" method="POST">
        <label for="numero">Número del que desea  generar la tabla</label>
        <input type="text" name="numero" id="">
        <br />
        <input type="submit" value="Generar">
    </form>
</fieldset>

</body>
</html>
