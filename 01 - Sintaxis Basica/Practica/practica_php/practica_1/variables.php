<?php
/**
 * User: Isabel González Anzano
 * Date: 05/11/20
 * Version: 1.2
 */
header("Refresh:5,url='index-intento2.php'");
//Variables:
$numero_entero = 31;
$var_octal = 0677;
$var_hexadecimal = 0xAbC64;
$var_binario = 0b0010;
$var_real = 5.7343223007896531646415;
$var_real_notacion_cientifica = 5678E-2;
$cadena_comillas_dobles = "Esta cadena está entre comillas dobles";
$cadena_comillas_simples = 'Esta cadena está entre comillas simples';
$var_heredoc = <<<FINAL
            <pre>"Esta es una cadena
            de caracteres que utiliza
            Heredoc, así que puedo poner variables como
            $numero_entero \$numero_entero y me lo va a interpretar .\\n
            y también carácteres especiales. 'Como estas comillas simples' ya ves
            qué fácil funciona"</pre>
FINAL;
$var_newdoc = <<<'FINAL'
            <pre>'Esta es una cadena
            de caracteres que utiliza
            NewDoc, así que puedo poner variables como
            $numero_entero y  NO me lo va a interpretar .\\n
            los únicos elementos que interpreta son las \ \\'</pre>
FINAL;
$var_null = null;
$var_bool_true = true;
$var_bool_false = false;

//$asignacion_erronea_octal = 0688;
//print "Esto da error porque en octal el 8 no es un dígito correcto: ". $asignacion_erronea_octal;

//Funciones:
function parse_null_type($var){
    return true === is_null($var) ? 'Null' : $var;
}
function parse_bool_type($var){
    return true === (bool)$var ? 'True' : 'False';
}

//Renders:
function print_val_dec($numero_entero){
    print "<div>Esto es un número entero: ".$numero_entero."<br/></div>";
}
function print_val_oct($var_octal){
    //print "Esto da error porque en octal el 8 no es un dígito correcto: ". $asignacion_erronea_octal;
    print "<div>Esto es un número en octal: ". $var_octal."</div>";
    printf ("<div>Valor del número en Octal %o <br/>", $var_octal,"</div>");
}
function print_val_hex($var_hexadecimal){
    print "<div>Esto es un número hexadecimal: ".$var_hexadecimal."<br/></div>";
    printf ("Valor del número en hexadecimal %X <br/>", $var_hexadecimal,"</div>");
}
function print_val_bi($var_binario){
    print "<div>Esto es un número binario: ".$var_binario."<br/></div>";
    printf ("<div>Valor del número en binario %b <br/>", $var_binario, "</div>");
}
function print_val_real($var_real){
    print "<div>Esto es un número real: ".$var_real."<br/></div>";
    printf ("<div>Valor del número en real con 3 decimales %.3f <br/>", $var_real,"</div>");
}
function print_val_real_not_cient($var_real_notacion_cientifica){
    print "<div>Esto es un número real con notación científica: ".$var_real_notacion_cientifica."<br/></div>";
    printf ("<div>Valor del número en real con notación científica %e <br/>", $var_real_notacion_cientifica,"</div>");
}
function print_val_char_dobles($cadena_comillas_dobles){
    print "<div>Esto es una cadena de texto: ".$cadena_comillas_dobles."<br/></div>";
    print "<div>Para que se muestren las comillas dobles: \"$cadena_comillas_dobles \"<br/></div>";
}
function print_val_char_simples($cadena_comillas_simples){
    print "<div>Esto es una cadena de texto: ".$cadena_comillas_simples."<br/></div>";
    print "<div>Para que se muestren las comillas simples: ". "'".$cadena_comillas_simples."' <br/></div>";
}
function print_val_heredoc($var_heredoc){
    print "<div>".$var_heredoc."</div>";
}
function print_val_newdoc($var_newdoc){
    print "<div>".$var_newdoc."</div>";
}
function print_val_null($var_null){
    print "<div>Esta variable tiene valor nulo: ".parse_null_type($var_null)." <br /></div>";
}
function print_val_bool($var_bool){
    print "<div>Esta variable es booleana y vale: ".parse_bool_type($var_bool)." <br /></div>";
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/ico" sizes="32x32" href="../favicon.ico">
    <title>Variables en PHP</title>

</head>
<body>
<div class="container jumbotron">
<h1>Variables en PHP</h1>
        <h2>Haz el noveno ejercicio del wiki de la sección de actividades</h2>
        <ul>
            <li>Cambia el valor de las variables</li>
            <li>Visualiza con print en lugar que con echo</li>
        </ul>
        <i>Volver al index después de 5 segundos*</i>

    <!-- Card Deck -->
    <div class="card-deck">

        <div class="card pmd-card">
            <div class="card-body">
                <h2 class="card-title">Valores Numéricos</h2>
                <p class ="card-subtitle alert-danger"> Aviso: todos los valores integer que no son decimales se ven como decimal debido a que estamos usando print,
                    para verlos correctamente hay que usar printf o format.</p>
                <p class="card-text"><h6>Decimal</h6><?php print_val_dec($numero_entero); ?>
                <h6>Octal</h6><?php print_val_oct($var_octal); ?>
                <h6>Hexadecimal</h6> <?php print_val_hex($var_hexadecimal); ?>
                <h6>Binario</h6><?php print_val_bi($var_binario); ?>
                <h6>Reales</h6>
                <?php print_val_real($var_real); ?>
                <?php print_val_real_not_cient($var_real_notacion_cientifica); ?></p>
            </div>
        </div>

        <div class="card pmd-card">
            <div class="card-body">
                <h2 class="card-title">Cadenas de caracteres</h2>
                <p class="card-text"><h6>Comillas dobles</h6> <?php print_val_char_dobles($cadena_comillas_dobles); ?>
                <h6>Comillas simples:</h6><?php print_val_char_simples($cadena_comillas_simples); ?>
                <h6>Heredoc</h6><?php print_val_heredoc($var_heredoc); ?>
                <h6>NewDoc</h6><?php print_val_newdoc($var_newdoc); ?></p>
            </div>
        </div>

        <div class="card pmd-card">
            <div class="card-body">
                <h2 class="card-title">Null</h2>
                <p class="card-text"> <?php print_val_null($var_null); ?></p>
            </div>
        </div>

        <div class="card pmd-card">
            <div class="card-body">
                <h2 class="card-title">Booleans</h2>
                <p class="card-text"> <?php print_val_bool($var_bool_true); ?>
                    <?php print_val_bool($var_bool_false); ?></p>
            </div>
        </div>

    </div>

    <div class="container">
        <a href="index.php"><img src="img/inicio.png" alt="volver a inicio"></a>
    </div>

</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</html>