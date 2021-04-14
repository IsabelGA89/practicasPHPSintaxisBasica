<?php
$msj= "Te has autentificado como:<br/>\n";

$msj.= "Usuario: ". $_SERVER['PHP_AUTH_USER']."<br/>n";
$msj.= "Password: ". $_SERVER['PHP_AUTH_PW']."<br/>\n";
$msj.= "Tipo de autentificacion: ". $_SERVER['AUTH_TYPE'];
?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Título</title>
</head>
<header>
    <h1>Titulo ejercicio</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Accediendo con php a la autentificación
            Modifica la página restringida para ver el usuario y password así como el método usado de autentifiación
            El código que habría que añadir:
        </p>
        <p><pre>
              <?php
              echo "te has autentificado como:<br/>";

              echo "Usuario: ". $_SERVER['PHP_AUTH_USER']."<br/>";
              echo "Password: ". $_SERVER['PHP_AUTH_PW']."<br/>";
              echo "Tipo de autentificacion: ". $_SERVER['AUTH_TYPE'];
              ?>
        </pre></p>
        <div style="background-color: lightpink">
            <h1>Página con acceso restringido</h1>
            <h2>Si has accedido es por que eres un usuario con privilegios</h2>
            <h3><?=$msj?></h3>

        </div>

    </div>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <div class="footer-copyright text-center py-3">© 2021 Copyright
        Isabel González Anzano
    </div>
</footer>
<!-- Footer -->
