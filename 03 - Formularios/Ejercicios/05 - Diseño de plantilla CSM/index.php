<!DOCTYPE html>





<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="pagina.php" method="POST">
    Altura de la cabecera <input type:text name="hh" value="150"><br />
    Altura del menú <input type:text name="hm" value="800"><br />
    Anchura del menú <input type:text name="wm" value="100"><br />
    Anchura del  contenido <input type:text name="wc"value="600"><br />
    Selecciona el color de fondo de la cabecera
    <select name="ch" value="red" id="">
        <option style="background:red" value="red">Red</option>
        <option style="background:green" value="green">Verde</option>
        <option style="background:yellow" value="yellow">Amarillo</option>
        <option style="background:blue" value="blue">Azul</option>
    </select>
    <br />
    Selecciona el color de fondo del menú
    <select name="cm" value="green" id="">
        <option style="background:red" value="red">Red</option>
        <option style="background:green" value="green">Verde</option>
        <option style="background:yellow" value="yellow">Amarillo</option>
        <option style="background:blue" value="blue">Azul</option>
    </select>
    <br />
    Selecciona el color de fondo del contenido
    <select name="cc" value="yellow" id="">
        <option style="background:red" value="red">Red</option>
        <option style="background:green" value="green">Verde</option>
        <option style="background:yellow" value="yellow">Amarillo</option>
        <option style="background:blue" value="blue">Azul</option>
    </select>
    <br />
    Tamaño del tíutlo en pixeles <input type="text" name="size" value=25><br />
    Texto para el título <input type="text" name="titulo" Value="Esto es un título de mi web site"><br />
    <input type="submit" value="Crear página">



</body>
</html>
