

<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Autentificacion 1</title>
</head>
<header>
    <h1>Autentificación</h1>
</header>
<body>
<div class="container">
    <h1>Enunciado</h1>
    <div class="jumbotron">
        <p>Ficheros de usuarios
            Crea un fichero llamado misUsuarios y añade 3 usuarios maria/maria nieves/nieves sara/sara. Se indica usuario/password
            Posteriormente visualiza el contenido del fichero
            Observa cómo la pass aparece cifrada
            Modo de actuación
            1.- Primero nos ubicamos en el directorio donde queramos añadir o crear el fichero

            cd /home/MiUsuario
            MiUsuario es vuestro propio directorio
            2.-Ahora creamos un directorio para guardar esta información y nos movemos en él

            mkdir usuarios
            cd usuarios
            3.-Una vez correctamente ubicados generamos el fichero de las password con la herramienta htpasswd

            La primera vez con opción -c para crear el fichero
            htpasswd -c misUsuarios maria
            htpasswd  misUsuarios nieves
            htpasswd misUsuarios nieves
            5.- Crea una página index.html que contenga un texto
            4.- Crea un fichero .htaccess en el directorio y especifica la directivas necesarias
            para que al acceder a la página index.html te solicite credenciales

        </p>
        <div style="background-color: lightpink">
            <div><p>Usuario: isabel</p><p>Contraseña:1234</p></div>
            <div><a href="restringido.php">Haz click aquí para acceder a la página restringida</a></div>

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
