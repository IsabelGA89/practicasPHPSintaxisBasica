<?php
//Functions--
function parse_bool_type($var){
    return true === (bool)$var ? 'True' : 'False';
}
function parse_null_type($var){
    return true === is_null($var) ? 'Null' : $var;
}
function show_ascii_range($start,$end){
    echo "<div class=container>";
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th scope='col'>Número</th>";
    echo "<th scope='col'>ASCII</th>";
    echo "<tr>";
    echo "</thead>";
    echo "<tbody>";

    for ($i = $start; $i <= $end; $i++){
        echo "<tr>";
        echo "<th scope='row'>$i</th>";
        echo "<th scope='row'>".chr($i)."</th>";
        echo "</tr>";
        /*echo $i. " - ".chr($i)."<br/>";*/
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

function get_days_until_today(){
    $now = time();
    $unix_date = strtotime("1970-01-01");
    $datediff = $now - $unix_date;
    return round($datediff / (60 * 60 * 24));
}
function get_hours_until_today(){
    $now = time();
    $unix_date = strtotime("1970-01-01");
    $datediff = $now - $unix_date;
    return round($datediff / (60 * 60));
}
function get_mins_until_today(){
    $now = time();
    $unix_date = strtotime("1970-01-01");
    $datediff = $now - $unix_date;
    return round($datediff / 60 );
}
function get_birthday_in_time($birthday){
    $fecha_nac = new DateTime(date('Y/m/d',strtotime($birthday))); // Creo un objeto DateTime de la fecha ingresada
    $fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
    $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
    return $edad;
}

//Constants and var --
//TIME VARS:
$today_date = date("Y-m-d", time());
$today_date_unix_format = strtotime("now");

$day = date("d");
$year = date("Y");
$month = date("m");
$hour = date("G");
$minute = date("i");
$second = date("s");
$today= gmmktime($hour,$minute,$second,$month,$day,$year);

$mi_cumple = "1989/07/12";
$edad = get_birthday_in_time($mi_cumple);


//Exercises --
//Exercise 0:
//Define dos variables con mi nombre y apellidos
const NOMBRE = "Isabel";
const APELLIDOS = "González Anzano";
//Visualizo el texto con echo y print, por ejemplo en mi caso (deben de aparecer las comillas del ejemplo
// mi nombre es "Manuel" y mi apellido es "Romero"
function render_ex_0($nombre,$apellidos){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 0</h2>";
    echo "<div class = 'enunciado card-subtitle'>Visualizo el texto con echo y print</div>";
    echo "<div class='container alert-info'>";
    echo "<div>Echo: Mi nombre es \"$nombre\" y mis apellidos son \"$apellidos\" <br/></div>";
    print("<div>Print: Mi nombre es \"$nombre\" y mis apellidos son \"$apellidos\"<br/></div>");
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}

//1)con echo pasando varios argumentos (separadados por coma)
function render_ex_1($nombre,$apellidos){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 1</h2>";
    echo "<div class = 'enunciado card-subtitle'>Con echo pasando varios argumentos (separadados por coma)</div>";
    echo "<div class='container alert-info'>";
    echo "<div>Echo: pasando varios argumentos -","Mi nombre es \"",$nombre,"\" y mis apellidos \"",$apellidos, "\" <br/></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}

//2)con print
function render_ex_2(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 2</h2>";
    echo "<div class = 'enunciado card-subtitle'>con print</div>";
    echo "<div class='container alert-info'>";
    print "<div>Print sólo acepta un parámetro por lo que no se le pueden pasar varios argumentos. <br/></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//3,4 y 5)Explica en el fichero diferencias entre echo y print y semejanzas.
function render_ex_3_4_5(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicios 3,4 y 5</h2>";
    echo "<div class = 'enunciado card-subtitle'>Explica en el fichero diferencias entre echo y print y semejanzas.</div>";
    echo "<div class='container'>";
    echo "<div class='respuesta'>";
      echo   "<div class='jumbotron'>";
          echo  "<h4>echo</h4>";
           echo "<p>Según la definición de la <a href='https://www.php.net/manual/es/function.echo.php'>documentación oficial</a>";
            echo " muestra una o más cadenas y sigue esta estructura:<br/>";
            echo '<div class="alert alert-dark"><i>echo ( string $arg1 [, string $... ] ) : void</i></div></p>';
            echo "<p>echo también posee una sintaxis abreviada, donde se puede poner el símbolo igual justo después de la etiqueta de apertura de PHP.
                    Ejemplo: <br/><div ><img class='image-carbon rounded mx-auto d-block' src='img/ej_echo_abreviado.png' alt='imagen ejemplo código abreviado echo'></div>";
           echo "</p>";
           echo "</div>";
           echo '<div class="jumbotron">';
            echo "<h4>print</h4>";
            echo '<p>Según la definición de la <a href="https://www.php.net/manual/es/function.print.php">documentación oficial</a>';
              echo " print muestra una cadena y sigue esta estructura:<br/>";
            echo '<div class="alert alert-dark"><i>print ( string $arg ) : int</i></div></p>';
           echo  "</div>";
            echo '<div class="alert alert-success" role="alert">';
              echo  " <h5>Semejanzas</h5>";
              echo  "<p>echo y print son constructores de lenguaje, no son verdaderamente funciones.<br/>
                Los constructores de lenguaje suelen ser ligeramente más rápidos que las funciones
                y no requieren el uso de paréntesis</p>";
            echo "</div>";
            echo' <div class="alert alert-danger" role="alert">';
               echo '<h4>Diferencias</h4>
                <p>print imprime una cadena, echo puede imprimir más de una separadas por coma.</p>
                <p>print devuelve un valor int que según la documentación siempre es 1, por lo que puede ser utilizado en expresiones
                mientras que echo es tipo void, no hay valor devuelto y no puede ser utilizado en expresiones</p>
                <p>Según algunas fuentes, como <a href="https://www.w3schools.com/php/func_string_print.asp">w3schools</a>,
                echo es ligeramente más rápido que print.</p>
                <p>print devuelve un valor, por lo que se puede utilizar como una expresión.</p>';
           echo "</div>";
        echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}

//6) Indica Por qué puedes pasar los argumentos sin usar paréntesis
function render_ex_6(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 6</h2>";
    echo "<div class = 'enunciado card-subtitle'>Indica Por qué puedes pasar los argumentos sin usar paréntesis</div>";
    echo "<div class='container'>";
    echo '<div class="jumbotron">
            <h4>Motivo</h4>
            <p>Como se ha explicado en el apartado anterior, al ser echo y print constructores del lenguaje, en vez de funciones, esto nos
            permite utilizarlos sin paréntesis ya que NO son funciones.</p>
            </div>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
/*7) Sintaxis heredoc,*/
//Asigna a una variable llamada informe un texto de cinco líneas,
//la etiqueta de finalización es FIN
//Posteriormente visualizas el texto
// El contenido de 'informe' es:
//   ........
// aquí aparecer el contenido del informe
// debe de respetarse el número de 5 líneas asignadas previamente";
//Tener cuidado con que la etiqueta no lleve en esa línea ningún otro carácter (espacios en blanco o tabulacones)

function render_ex_7(){
    $informe=<<<"FIN"
<br/>Heredoc (conjunción apocópica de Here-document o Documento-aquí en español)<br/>
es una forma de representar cadenas en los lenguajes de programación o shells de algún Sistema Operativo basado en Unix.<br/>
Con heredoc se pueden transmitir grandes cadenas de texto con poco esfuerzo.<br/>
El texto (generalmente párrafos) creados con instrucciones heredoc incluyen y respetan la indentación,<br/> 
los espacios y caracteres de nueva línea del texto y otros atributos difíciles de incluir con texto simple, como las comillas dobles.</br>
FIN;

    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 7</h2>";
    echo "<div class = 'enunciado card-subtitle'><strong>Sintaxis heredoc</strong> - Asigna a una variable llamada informe un texto de cinco líneas y visualiza ese texto</div>";
    echo "<div class='container'>";
    print "<div>El contenido de 'informe' es: $informe <br/></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
/*PROBANDO VARIABLES (del 8 al 19)*/
function render_ex_8_to_19(){
    //Crea una variable y asígnale un valor
    $variable_pruebas = 1;
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicios del 8 al 19</h2>";
    echo "<div class = 'enunciado card-subtitle'>PROBANDO VARIABLES</div>";
    echo "<div class='container'>";
    //visualiza el valor de la variable y el tipo que eś
    echo "<div>La variable_pruebas vale: $variable_pruebas y es de tipo ".gettype($variable_pruebas)."<br/></div>";
    //Cambia la variable a los siguientes tipos :boolean, float, string y null,  y visualizar su valor y tipo
    $variable_pruebas = false;
    echo "La variable_pruebas vale: ".parse_bool_type($variable_pruebas)." y es de tipo ".gettype($variable_pruebas)."<br/>";
    $variable_pruebas = 1.6;
    echo "La variable_pruebas vale: $variable_pruebas y es de tipo ".gettype($variable_pruebas)."<br/>";
    $variable_pruebas = "Ahora soy un string :3";
    echo "La variable_pruebas vale: $variable_pruebas y es de tipo ".gettype($variable_pruebas)."<br/>";
    $variable_pruebas = null;
    echo "La variable_pruebas vale: ".parse_null_type($variable_pruebas)." y es de tipo ".gettype($variable_pruebas)."<br/>";
    //Prueba a ver el valor y tipo de una variable no definida previamente
    echo "La variable_sin_definir vale: ".parse_null_type($variable_sin_definir)." y es de tipo ".gettype($variable_sin_definir)."<br/>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
/* 20)Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii  .. puedes usar la función printf o  bien char() ..*/
function render_ex_20(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 20</h2>";
    echo "<div class = 'enunciado card-subtitle'>Visualiza el código ascii del valor 64 al 122 en carácter usando la función ascii</div>";
    echo "<div class='container'>";
    show_ascii_range($inicio=64,$final=122);
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//21)Visualiza el contenido de la función time() y explica su valor
function render_ex_21(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 21</h2>";
    echo "<div class = 'enunciado card-subtitle'>Visualiza el contenido de la función time() y explica su valor</div>";
    echo "<div class='container'>";
    echo '<div class="jumbotron">
                <h4>Time</h4>
                <p>Según la definición de la <a href="https://www.php.net/manual/es/function.time.php">documentación oficial</a>
                Time devuelve la fecha Unix actual, es decir, retorna el número de segundos transcurridos desde el 1 de Enero de 1970 00:00:00 GMT</p>
                <p>Por lo que su contenido es un Timestamp (Integer largo numérico) con una línea temporal de inicio fijada en el tiempo.
                De hecho, cada vez que se recargue la página el número, marcado en rojo, aumentará, ya que habrá pasado un segundo o más de tiempo.
                </p>
                <p><div class="alert alert-dark"><i>time ( void ) : int</i></div></p>
                <p>
                    <div class="alert alert-danger">';
           echo          "  Segundos transcurridos desde 1 de enero de 1970 <span style='color:red'>".time();"</span>";
              echo '</div>
                </p>
        </div>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//22)Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello
function render_ex_22(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 22</h2>";
    echo "<div class = 'enunciado card-subtitle'>Obtén la fecha actual y visualiza su valor con formato dia-mes-año en número usa la función date() para ello</div>";
    echo "<div class='container'>";
    echo "<div>La fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y")."</div>";
    echo "<div class='container'>".date("d") . "/" . date("m") . "/" . date("Y")  ."</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//23,24,y 25)Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970 (round() o floor() para redondear
function render_ex_23_24_25(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 23, 24 y 25</h2>";
    echo "<div class = 'enunciado card-subtitle'>Obtener los días, luego horas y luego minutos transcurridos desde el 1/1/1970</div>";
    echo "<div class='container'>";

    echo "<div class='alert-primary'>Han transcurrido ".get_days_until_today()." días desde el 1/1/1970</div>";
    echo "<div class='alert-primary'>Han transcurrido ".get_hours_until_today()." horas desde el 1/1/1970</div>";
    echo "<div class='alert-primary'>Han transcurrido ".get_mins_until_today()." minutos desde el 1/1/1970</div>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//Usando la función setlocale(...) y strftime(...)
//Puede ser que tengas que habilitar el idioma en el sistema con locale-gen
//26)  Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018
function render_ex_26($today){

    setlocale(LC_ALL,NULL);
    setlocale(LC_TIME, "es_ES.UTF-8");
    date_default_timezone_set ('Europe/Madrid');

    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 26</h2>";
    echo "<div class = 'enunciado card-subtitle'><strong>setlocale(...) y strftime(...)</strong> - Obtén la fecha actual con formato por ejemplo domingo, 28 de octubre de 2018</div>";
    echo "<div class='container'>";;
    $today_es2 = strftime("%c", $today);
    echo "<div class='alert-light'>setLocale modificado a es_ES <br/></div>";
    echo "<div class='container'>Fecha actual:".strftime("%A, %d de %B de %Y", $today)."</div>";
    echo "<div class='container'>$today_es2</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//27)  Ahora con formato en inglés  Sunday, 28 October 2018
function render_ex_27($today){

    setlocale(LC_ALL,NULL);
    setlocale(LC_TIME, 'en_US.UTF-8');
    date_default_timezone_set ('America/Toronto');

    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 27</h2>";
    echo "<div class = 'enunciado card-subtitle'><strong>setlocale(...) y strftime(...)</strong> - Ahora con formato en inglés  Sunday, 28 October 2018</div>";
    echo "<div class='container'>";;
    $today_en2 = strftime("%c", $today);
    echo "<div class='alert-light'>setLocale modificado a en_US <br/></div>";
    echo "<div class='container'>Fecha actual:".strftime("%A, %d de %B de %Y", $today)."</div>";
    echo "<div class='container'>$today_en2</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//28) y con formato en francés  dimanche, 28 octobre 2018
function render_ex_28($today){

    setlocale(LC_ALL,NULL);
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    date_default_timezone_set ('Europe/Paris');

    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 28</h2>";
    echo "<div class = 'enunciado card-subtitle'><strong>setlocale(...) y strftime(...)</strong> - Con formato en francés</div>";
    echo "<div class='container'>";;
    $today_fr2 = strftime("%c", $today);
    echo "<div class='alert-light'>setLocale modificado a fr_FR <br/></div>";
    echo "<div class='container'>Fecha actual:".strftime("%A, %d de %B de %Y", $today)."</div>";
    echo "<div class='container'>$today_fr2</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
    setlocale(LC_ALL,NULL);
}

// 29-30)Asigna a una variable la fecha de tu cumpleaños
// Realiza una operación y obtén tu edad en años, meses y días (valor entero).
// tienes 23 años, 10 meses y 4 días
function render_ex_29_30($edad){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicios 29 y 30</h2>";
    echo "<div class = 'enunciado card-subtitle'>Asigna a una variable la fecha de tu cumpleaños
                Realiza una operación y obtén tu edad en años, meses y días (valor entero)</div>";
    echo "<div class='container'>";
    echo "<div class='alert-success'>Tienes {$edad->format('%Y')} años , {$edad->format('%m')} meses y 
{$edad->format('%d')} días</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//31-32)Asigna a una variable una fecha de 30/10/1969 (mira las funciones strtotime() o bien mktime() para ello
// Obtén su edad en años, en meses y luego en días siempre redondeando
// tienes xx años
// tienes xx meses
// tienes xx días
function render_ex_31_32(){
    $fecha = mktime(0,0,0,10,30,1969);
    $inicio = time();
    $datediff = $inicio - $fecha;

    $years = round($datediff / 31536000 );
    $months = round($datediff / 2592000);
    $days = round($datediff / 86400 );

    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicios 31 y 32</h2>";
    echo "<div class = 'enunciado card-subtitle'>Asigna a una variable una fecha de 30/10/1969, Obtén su edad en años, en meses y luego en días siempre redondeando</div>";
    echo "<div class='container'>";
    echo "<div class='alert-secondary'>Tienes $years años</div>";
    echo "<div class='alert-secondary'>Tienes $months meses</div>";
    echo "<div class='alert-secondary'>Tienes $days días</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//33-36). Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado
//. Si escribo getdate(1) podrías explicar el contenido del array que nos retorna
//. Obtener la edad de una persona nacida el 1/1/1969
function render_ex_33_to_36(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicio 33 a 36</h2>";
    echo "<div class = 'enunciado card-subtitle'>Usa la función getdate(...) y visualiza con la función print_r(.) el valor que retorna, comenta el resultado</div>";
    echo "<div class='container'>";

    echo "<div class='alert-secondary'><strong>getdate() ".print_r(getdate(),true)."</strong></div>";
    echo "<div class='alert-secondary'>La función devuelve un array asociativo con información relacionada con la marca de tiempo timestamp,en este caso al 
no darle ningún argumento, toma el timestamp del momento local actual, al estar imprimiéndose con print_r lo muestra.</div>";
    echo "<br/>";
    echo "<div class='alert-secondary'><strong>getdate(1) ".print_r(getdate(1),true)."</strong></div>";
    echo "<div class='alert-secondary'>El argumento que se pasa a la función, en este caso 1, es considerado el timestamp a calcular.<br/>
En este caso, lo interpreta como que la fecha que se le ha pasado es 1/01/1970</div>";
    echo "<br/>";
    echo "<div class='alert-info'><pre>
Los valores del array son los siguientes:

[seconds] – Segundos –> 0-59
[minutes] – Minutos –> 0-59
[hours] – Horas –> 0-23
[mday] – Día del mes –> 1-31
[wday] – Día de la semana –> 0(Domingo) – 6(Sábado)
[mon] – Mes –> 1-12
[year] – Año –> 4 dígitos
[yday] – Día del año –> 0-365
[weekday] – Día de la semana en formato texto –> Sunday-Saturday
[month] – Nombre del mes –> January-December
[0] – Segundos Unix –> -2147483648 hasta 2147483647
</pre></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}
//37-64)Explica el siguiente código observando el resultado que se produce fuente obtenido en parte de
// http://php.net/manual/es/function.strtotime.php
function render_ex_37_to_64(){
    echo "<div class='jumbotron'>";
    echo "<div class='container card-title'> <h2>Ejercicios 37 a 64</h2>";
    echo "<div class = 'enunciado card-subtitle'>Explica el siguiente código observando el resultado que se produce</div>";
    echo "<div class='container'>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('now')</strong>
    convierte una cadena con formato de fecha en otra con formato de fecha Unix. 
    El formato Unix comprende el número de segundos desde el 1 de enero del 1970 00:00:00 UTC 
    hasta el momento en el que se ejecuta la función.</div>";
    echo strtotime("now"), " - Es el número de segundos que han pasado hasta el momento actual desde la fecha 1/1/1970<br/>";
    echo "</div>";
echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y', strtotime('now'))</strong>
    date() nos devuelve  formateada la fecha local del sistema para obtener el día, mes, semana, año y hora actual</div>";
    echo date('d-m-Y', strtotime("now")), " - Esta marcando en el formato día, mes año la fecha actual<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('27 September 1970')</strong>
       Esta función espera que se proporcione una cadena que contenga un formato de fecha en Inglés US e 
       intentará convertir ese formato a una fecha Unix (el número de segundos desde el 1 de Enero del 1970 00:00:00 UTC), 
       relativa a la marca de tiempo dada como argumento, o la marca de tiempo actual si no se proporciona argumento</div>";
    echo strtotime("27 September 1970"), " - En este caso es el timestamp transcurrido desde la fecha 1/1/1970 hasta 27/9/1970<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('10 September 2000'))</strong>
      En este caso nos esta devolviendo el timestamp de la fecha 10/9/2000, convertido con el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('+1 day')</strong>
     Nos devuelve el timestamp del día siguiente al día actual</div>";
    echo strtotime("+1 day"), "<br/>";
    /*echo date('d-m-Y',strtotime("+1 day")), "<br/>";*/
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('+1 day'))</strong>
      En este caso nos esta devolviendo el timestamp del día siguiente al día actual, convertido en el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("+1 day")), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('+1 week')</strong>
     Nos devuelve el timestamp de la semana siguiente al día actual</div>";
    echo strtotime("+1 week"), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('+1 day'))</strong>
      En este caso nos esta devolviendo el timestamp de la semana siguiente al día actual, convertido en el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("+1 week")), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('+1 week 2 days 4 hours 2 seconds')</strong>
     Nos devuelve el timestamp de la semana siguiente al día actual, más 2 días,4 horas y 2 segundos</div>";
    echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('+1 week 2 days 4 hours 2 seconds'))</strong>
      En este caso nos esta devolviendo el timestamp de la semana siguiente
       al día actual, más 2 días,4 horas y 2 segundos convertido en el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('next Thursday')</strong>
     Nos devuelve el timestamp del próximo Jueves</div>";
    echo strtotime("next Thursday"), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('next Thursday'))</strong>
      En este caso nos esta devolviendo el timestamp del próximo Jueves, convertido en el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-primary'>";
    echo "<div><strong>strtotime('last Monday')</strong>
     Nos devuelve el timestamp del pasado Lunes</div>";
    echo strtotime("last Monday"), "<br/>";
    echo "</div>";

    echo "<br/>";
    echo "<div class='alert-success'>";
    echo "<div><strong>date('d-m-Y',strtotime('last Monday'))</strong>
      En este caso nos esta devolviendo el timestamp del pasado Lunes, convertido en el formato día, mes y año.</div>";
    echo date('d-m-Y',strtotime("last Monday")), "<br/>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<hr/>";
}


?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/ico" sizes="32x32" href="../favicon.ico">
    <title>Práctica 2</title>
</head>
<body>
<div class="container">
    <h1>Práctica 2 - Isabel González Anzano</h1>

    <div class="accordion" id="accordion">
        <div class="card">
            <div class="card-header" id="Ej_0">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Ejercicio 0
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#Ej_0">
                <div class="card-body">
                    <?php render_ex_0(NOMBRE,APELLIDOS);?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="ej_1">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Ejercicio 1
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#ej_1">
                <div class="card-body">
                    <?php render_ex_1(NOMBRE,APELLIDOS);?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="ej_2">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Ejercicio 2
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#ej_2">
                <div class="card-body">
                    <?php render_ex_2();?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="ej_3_5">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Ejercicios 3 a 5
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#ej_3_5">
                <div class="card-body">
                    <?php render_ex_3_4_5();?>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-header" id="ej_6">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            Ejercicio 6
                        </button>
                    </h2>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#ej_6">
                    <div class="card-body">
                        <?php render_ex_6();?>
                    </div>
                </div>
        </div>
        <div class="card">
                <div class="card-header" id="ej_7">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            Ejercicio 7
                        </button>
                    </h2>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#ej_7">
                    <div class="card-body">
                        <?php render_ex_7();?>
                    </div>
                </div>
        </div>
        <div class="card">
                <div class="card-header" id="ej_8_19">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            Ejercicios 8 a 19
                        </button>
                    </h2>
                </div>
                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#ej_8_19">
                    <div class="card-body">
                        <?php render_ex_8_to_19();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_20">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                            Ejercicio 20
                        </button>
                    </h2>
                </div>
                <div id="collapse8" class="collapse" aria-labelledby="heading8e" data-parent="#ej_20">
                    <div class="card-body">
                        <?php render_ex_20();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_21">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                            Ejercicio 21
                        </button>
                    </h2>
                </div>
                <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#ej_21">
                    <div class="card-body">
                        <?php render_ex_21();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_22">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                            Ejercicio 22
                        </button>
                    </h2>
                </div>
                <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#ej_22">
                    <div class="card-body">
                        <?php render_ex_22();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_23_25">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                            Ejercicios 23 a 25
                        </button>
                    </h2>
                </div>
                <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#ej_23_25">
                    <div class="card-body">
                        <?php render_ex_23_24_25();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_26">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                            Ejercicio 26
                        </button>
                    </h2>
                </div>
                <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#ej_26">
                    <div class="card-body">
                        <?php render_ex_26($today);?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_27">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                            Ejercicio 27
                        </button>
                    </h2>
                </div>
                <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#ej_27">
                    <div class="card-body">
                        <?php render_ex_27($today);?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_28">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                            Ejercicio 28
                        </button>
                    </h2>
                </div>
                <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#ej_28">
                    <div class="card-body">
                        <?php render_ex_28($today);?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_29_30">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                            Ejercicio 29 y 30
                        </button>
                    </h2>
                </div>
                <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#ej_29_30">
                    <div class="card-body">
                        <?php render_ex_29_30($edad);?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_31_32">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                            Ejercicio 31 y 32
                        </button>
                    </h2>
                </div>
                <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#ej_31_32">
                    <div class="card-body">
                        <?php render_ex_31_32();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_33_36">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                            Ejercicio 33 a 36
                        </button>
                    </h2>
                </div>
                <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#ej_33_36">
                    <div class="card-body">
                        <?php render_ex_33_to_36();?>
                    </div>
                </div>
            </div>
        <div class="card">
                <div class="card-header" id="ej_37_64">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                            Ejercicio 37 a 64.
                        </button>
                    </h2>
                </div>
                <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#ej_37_64">
                    <div class="card-body">
                        <?php render_ex_37_to_64();?>
                    </div>
                </div>
            </div>
    </div>

</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        Isabel González Anzano
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
</html>