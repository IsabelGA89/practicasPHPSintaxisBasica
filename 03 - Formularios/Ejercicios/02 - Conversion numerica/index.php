<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <title>Conversión de sistemas numéricos</title>
    <link rel="stylesheet" href="estilo.css?v=<?php time()?>" type="text/css">
</head>
<body>
<fieldset width="40%">
    <legend>Valor numérico</legend>
    <form action="conversion.php" method="POST">
        <label for="num">Número para realizar su conversión </label>
        <br />
        <input type="text" name="num" id="">
        <br /><br />
        <input type="submit" value="Enviar">
    </form>
</fieldset>

</body>
</html>
