<?php

//limpiamos completamente el array superglobal
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<div>
    <h3>Enunciado ejercicio:</h3>
    <p><pre>
        Accesos restringidos
Utilizando la autentificción de usuario y pass en el servidor y ficheros .htaccess,
Crea un fichero de contraseñas llamado misUsuarios con por ejemplo 5 usuarios (alicia, sara, jorge, paula, manolo)
Crea un fichero de grupos con por 1 grupo (grupo_familia) al que pertenecerán sara, alicia y paula)
Crea un sencillo sitio web que me redirija a 4 páginas:
Información General : Tendrá acceso todo el mundo
Información restringida: Sólo tenrán acceso los usuarios creados en el fichero misUsuarios
Información Sara : Tendrá acceso solo el usuario sara
Información de grupo : Tendrá acceso los usuarios 3 usuarios de los 5 creados (sara alicia y paula).
Cada página simplemente contredrá un texto en h1
    </pre></p>
</div>

<div id="login">
    <fieldset>
        <legend>
            Acceso restringido</legend>
        <ol>
            <li><a href="./general/index.html">Acceso general sin restrincción</a></li>
            <li><a href="./grupo/index.php">Acceso a los usuario pertenecientes al grupo familia</a></li>
            <li><a href="./restringido/index.php">Acceso restringido a los usuarios registrados</a></li>
            <li><a href="./sara/index.php">Acceso solo permitido al usuario sara</a></li>
            <li><a href="./nobody/index.php">Eliminar credenciales</a></li>
        </ol>
    </fieldset>
</div>

</body>
</html>
