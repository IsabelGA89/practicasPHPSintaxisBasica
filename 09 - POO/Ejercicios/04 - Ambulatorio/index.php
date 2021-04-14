<?php
//Require mejor gestionado.
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

?>
<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--  <link rel="stylesheet" href="/css/style.css">-->
    <title>Ambulatorio</title>
</head>
<header>
    <h1>Ambulatorio</h1>
</header>
<body>
<div class="container">
    <h1>Crerar una app de un ambulatorio</h1>
    <div class="jumbotron">
        <p>Enunciado</p>
        <pre>
            Herencia: gestión personal ambulatorio
            Se pide gestionar un ambulatorio.
            Para ello vamos a hacer sólo el diagrama de clases y su implementación.
            Lo hacemos a nivel básico (sin entrar en detalles).
            Tras realizar un análisis se determina que se pretende gestionar:
            los datos de los empleados y anotar las acciones básicas que realizan.
            Encontramos los siguientes elementos que especificamos como clases:
-Conserjes
-Enfermeras
-Médicas
        </pre>
        <div style="background-color: lightpink">
            <?php

            $medico1 = new Medica("María", "Martínez", "Casa de María", 29, "Cardiólogía");
            $medico2 = new Medica("Luis", "Pérez", "Casa de Luis", 38, "Pediatría");
            $medico3 = new Medica("Nieves", "Ruiz", "Casa de Nieves", 44, "Dermatología");


            $conserje = new Conserje("Soledad", "Viruela", "Casa de Soledad", 58, "Mostrador Entrada");

            $enfermera = new Enfermera("Javier", "Moreno", "Casa de Javier", 42);
            $enfermera2 = new Enfermera("Luis", "Perez", "Casa de Javier", 36);
            $enfermera3 = new Enfermera("Ana", "López", "Casa de Ana", 29,1989);




            $conserje->avisoEnfermera($enfermera, "Realizar cura en brazo Señor Martínez NSS 50/2155441/35");

            $enfermera->avisoMedico($medico3, "Paciente con toss y fiebre");

            $enfermera2->avisoMedico($medico2, "Paciente con toss y fiebre");
            $enfermera2->avisoMedico($medico2, "Paciente con Vómitos");
            $enfermera2->avisoMedico($medico3, "Paciente con pie torcido, impresión de rotura");

            $enfermera3->hacerCura($medico2,"Febrícula");
            $enfermera3->hacerCura($medico1,"Vacunación");
            $enfermera3->hacerCura($medico1,"Abceso");



            $conserje->avisoMedico($medico1, "Visitar en casa con mucha fiebre", "Visita");
            $conserje->avisoMedico($medico1, "Problemas para desplazarse ", "Visita");
            $conserje->avisoMedico($medico2, "Mareos y vétigos", "Visita");
            $conserje->avisoMedico($medico2, "Persona mayor con poca mobilidad", "Visita");
            $conserje->avisoMedico($medico3, "Niño pequeño con fiebre", "Visita");
            $conserje->avisoMedico($medico1, "Caída en el parque", "Consulta");

            echo "<h1>Médicos</h1>";
            echo "$medico3";
            echo "$medico1";
            echo "$medico2";


            echo "<hr/>";
            echo "<h1>Enfermeras</h1>";
            echo "$enfermera";
            echo "$enfermera2";
            echo "$enfermera3";

            echo "<hr/>";
            echo "<h1>Conserjes</h1>";
            echo "$conserje";
            echo $conserje->mostrarPuesto();

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
