<?php
//Carga de las clases que se van a utilizar:
spl_autoload_register(function ($clase) {
    require "./Class/$clase.php";
});

//Variables
/*$arr_historico = [];*/

//Funciones:
function imprime_bonito_array($arr)
{
    echo '<pre>';
    echo htmlspecialchars(print_r($arr, true));
    echo '</pre>';
}

//Testing:
function pintar_test($variable_testeo)
{
    echo "$variable_testeo";
}

function test_activo()
{
    $is_test = false;
    if (isset($_POST['test']) && $_POST['test'] != "") {
        $is_test = true;
    }
    return $is_test;
}

function verificar_test()
{
    $variable_testeo = "";
    if (test_activo() == true) {
        $variable_testeo = $_POST['test'];
        pintar_test($variable_testeo);
    }

    return $variable_testeo;
}

if (isset($_POST['enviar'])) {
    $stringOperacion = $_POST['operacion'];
    switch (Operacion::tipoOperacion($stringOperacion)) {
        case Operacion::RACIONAL:
            $opRacional = new OperacionRacional($stringOperacion);
            $descripcion = $opRacional->describe();
            $resultado = $opRacional->opera();
            $operacionNum = "$stringOperacion = $resultado";
            break;
        case Operacion::REAL:
            $opReal = new OperacionReal($stringOperacion);
            $descripcion = $opReal->describe();
            $resultado = $opReal->opera();
            $operacionNum = "$stringOperacion = $resultado";
            break;
        case Operacion::ERROR:
            if ($stringOperacion == "") {
                $descripcion = "<label>No se han introducido valores para el cálculo.</label>";
            } else {
                $operacionNum = $stringOperacion;
                $descripcion = "<label>La operación <span class='red_text'><strong>$stringOperacion</strong></span> no es una operación válida.</label>";
            }
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <script src="https://use.fontawesome.com/18c84e0de4.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Calculadora de Números reales</title>
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="stylesheet" type="text/css" href="Style/estilo.css" media="screen"/>
</head>
<body>
<!--<i class="fa fa-spinner fa-pulse"></i>-->
<header><h1><i class='fas fa-calculator' style='font-size:48px;'></i> Calculadora de números racionales</h1></header>

    <div class="container">
        <div class="col">
            <div class="col">
                <fieldset id="informacion">
                    <legend><i class="fas fa-ruler"></i> Reglas de uso de la calculadora</legend>
                    <div id=texhelp> La calculadora se usa escribiendo la operación.</div>
                    <div id=texhelp> La operación será <strong>Operando_1 operación Operando_2</strong>.</div>
                    <div id=texhelp> Cada operando puede ser número <strong>real o racional.</strong></div>
                    <div id=texhelp> Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong>
                            6/3 </strong>o<strong> 7/1</strong></div>
                    <div id=texhelp> Los operadores reales permitidos son <strong><font size='5' color='red'> + - *
                                /</font></strong>
                    </div>
                    <div id=texhelp> Los operadores racionales permitidos son <strong><font size='5' color='red'> + - *
                                :</font> </strong></div>
                    <div id=texhelp> No se deben de dejar espacios en blanco entre operandos y operación</div>
                    <div id=texhelp> Si un operando es real y el otro racional se considerará operación
                        racional</label></div>
                    <div id=texhelp> Ejemplo (Real)<strong>5.1+4</strong> (Racional)<strong>5/1:2</strong> (Error)<strong>5.2+5/1</strong>
                        (Error)<strong>52214+</strong> </label></div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <fieldset id="calculadora">
                    <legend><i class="fas fa-calculator"></i> Calculadora</legend>
                    <form action="." method="post">
                        <div id="operacion_caja">
                            <label>Introduzca la operación a realizar</label>
                            <input type="text" name="operacion" id="cajaoperacion" value="<?php verificar_test(); ?>">
                        </div>

                        <div id="grupo_botones_op_predefinidas">
                            <label>Operaciones predefinidas</label>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group" role="group" id="operaciones_racionales">
                                    <!-- <label> Operaciones Racionales</label>-->
                                    <input type="submit" class="btn btn-info" name="test" value="9/8+4/7">
                                    <input type="submit" class="btn btn-info" name="test" value="9/8-4/7">
                                    <input type="submit" class="btn btn-info" name="test" value="9/8*4/7">
                                    <input type="submit" class="btn btn-info" name="test" value="9/8:4/7">
                                    <input type="submit" class="btn btn-info" name="test" value="5/1:2">
                                    <input type="submit" class="btn btn-info" name="test" value="9/6:6">
                                </div>
                                <div class="btn-group" role="group" id="operaciones_reales">
                                    <!-- <label> Operaciones Reales    </label>-->
                                    <input type="submit" class="btn btn-secondary" name="test" value="9+2">
                                    <input type="submit" class="btn btn-secondary" name="test" value="10-5">
                                    <input type="submit" class="btn btn-secondary" name="test" value="8*6">
                                    <input type="submit" class="btn btn-secondary" name="test" value="9.4/2">

                                </div>
                                <div class="btn-group " role="group" id="operaciones_error">
                                    <!-- <label> Casos de error   </label>-->
                                    <input type="submit" class="btn btn-danger" name="test" value="5.2+5/1">
                                    <input type="submit" class="btn btn-danger" name="test" value="52214+">
                                    <input type="submit" class="btn btn-danger" name="test" value="9/5*5.6">
                                </div>
                            </div>
                        </div>

                        <div id="boton_calcular"><input type="submit" class="btn btn-dark btn-lg" name=" enviar"
                                                        value="Calcular">
                        </div>

                        <?php
                        if (isset($_POST['enviar'])) {
                            echo "<hr/>";
                            echo "<div id='resultado_text'><label>$operacionNum</label></div>";
                            /*array_push($arr_historico,$operacionNum);*/
                        }
                        ?>
                    </form>
                </fieldset>
            </div>
            <div class="col-md-6">
                <?php if (isset($descripcion)) { ?>
                    <fieldset id="resultado">
                        <legend><i class="fa fa-spinner fa-pulse"></i> Resultado</legend>
                        <label><?php
                            echo $descripcion;
                            ?></label>
                    </fieldset>
                <?php } ?>
            </div>
        </div>

        <!--<div class="container">
          <div class="jumbotron">
            <h2>Histórico de operaciones:</h2>-->
        <!-- --><?php /*imprime_bonito_array($arr_historico); */ ?>
        <!--  --><?php /*imprime_bonito_array($_POST); */ ?>
        <!-- --><?php /*var_dump($stringOperacion); */ ?>

        <!--  </div>
        </div>-->
    </div>

</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</html>
