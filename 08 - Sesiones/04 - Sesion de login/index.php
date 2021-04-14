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
    <h1>Registro</h1>
</header>
<body>
<div class="container">
    <h1>Registro</h1>
    <div class="jumbotron">
        <p>Creamos un sitio web que tenga un formulario para registrarse</p>
        <p>Además podemos mostrar un texto y una imagen.</p>
        <p>El sitio web tendrá 4 páginas: index.php publicidad.php administracion.php contabilidad.php</p>
        <p> Tanto index como publicidad son sitios a los que se puede acceder sin estar logueado</p>
        <p>A administración y contabilidad, solo se puede acceder estando logueado</p>
        <p>Un logueo será válido si tiene valor el usuario y password, diferente a un valor vacío</p>
         <p> Cuando se está logueado se visualizará el nombre y un botón de desloguear </p>
        <div style="background-color: lightpink">
            <?php
                echo "aquí el código";

            ?>

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
