# Práctica Multidioma
Esta práctica consiste en tomar este fichero y usando la bibliteca gettext, generar los ficheros necesrios para que este proyecto se adapte a los diferentes idiomas

Deberá de verse en los idiomas

* Inglés
* Francés
* Castellano

No funciona por ajax, por lo que cada vez que cambiemos el idioma deberemos ir al servidor para que adapte los textos al idioma establecido.

Tendremos en el index un formulario que pide dos datos.

Obligatoriamente hay que rellenar los dos datos, si no, dará un mensaje en el idioma correspondiente y se quedará  en la página idex.

Si rellenamos datos y presionamos el submit correspondiente iremos a una página llamada sitio.php donde  veremos un mensaje de bienvenida con el nombre del usuario

Igualmente en esta página podremos cambiar el idioma y volver a la página anterior (index)

En todo momento el idioma aparecerá con un texto en cabecera de la página, así como seleccionado el radio correspondinete

## Consideraciones
* Se debe de mantener el idioma establecido entre la páginas
* Podemos navegar de una página a otra
* Al ir de sitio.php a index.php, se debe de perder el nonmbre de usuario y su password
* Por defecto el idioma debe de ser el castellano
* Intenta no repetir código, usa funciones.
## Otras consideraciones

*Al realizar la práctica he tenido las siguientes  situaciones

1 .- El idioma para establecer a las funciones putenv y setlocale he tenido que establecer es_ES.utf8, fr_FR.utf8 ....

 Esta cuestiónn la he verificado por que veía que setlocale retornaba false, debe de retornar el valor establecido, si no, es que no puede establecerlo. 
 
 http://php.net/manual/es/function.setlocale.php
 
2 .- utf8, a veces no está bien reconocido, por lo que es mejor establecer el charset a ISO-8859-1

  https://www.gnu.org/software/gettext/FAQ.html#nonascii_strings
  
   En caso de hacer esto, habrá que ponerlo tanto en cada página como al generar los ficheros po (portable object)
   
    xgettext --from-code=ISO-8859-1 --language=PHP -j messages.po /var/www/idiomas/index.php /var/www/idiomas/sitio.php xxx
    
   Lo de xxx es por si hay mas ficheros    
   
 


## Ver ejemplo
 Podemos probar el ejemplo aquí.
 (A veces hay que recargar la página, para que coja bien el charset)
  http://manuel.infenlaces.com/distancia/practicas/practica_9_Multiidioma/
  

  
  
 

