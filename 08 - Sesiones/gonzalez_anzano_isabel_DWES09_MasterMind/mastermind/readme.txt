//NOTAS SOBRE LA IMPLEMENTACIÓN: ***********************************************************************************************

- se muestra la información del numero de aciertos de forma diferente si se juega en modo normal que en modo dificil.

//INFORMACIÓN SOBRE LAS VARIABLES DE SESIÓN UTILIZADAS: ***********************************************************************************************
Se han declarado y utilizado 4 variables de sesión en total:

    1º -> 'clave': almacena posiciones(index) y los colores para adivinar.
    [clave] => Array
            (
                [0] => Verde
                [1] => Blanco
                [2] => Morado
                [3] => Naranja
            )

    2º ->'num_jugada': Un número del 0 al 15.
    [num_jugada] => 1

    3º ->'dificultad': normal o dificil.
    [dificultad] => normal

    4º ->'jugada': array de objetos que contiene toda la información de la jugada: turno,colores,y aciertos
    [jugada] => Array
            (
                [1] => Array
                    (
                        [0] => Azul
                        [1] => Azul
                        [2] => Azul
                        [3] => Azul
                        [aciertos] => Array
                            (
                                [colores] => 0
                                [posiciones] => 0
                            )

                    )

            )

    Existe una función que está comentada en el código que muestra esta misma información, para temas de debug: imprime_sesiones();

//POSIBLES MEJORAS: ***********************************************************************************************
1 - Que los colores se generen aleatoriamente y no usar los predefinidos.
2 - Que se guarde en una variable de sesión un histórico con usuarios y puntuación - como un listado de records.
3 - Modalidad de juego Fácil, con menos intentos y un array de colores reducido.
4 - Modalidad de juego Muy Difícil, con menos intentos y un array de colores aumentado.

//MEJORAS IMPLEMENTADAS: ***********************************************************************************************
Index:
- Música en la primera pantalla. ( con controles )
- Enlace externo a la wikipedia, para tener la información completa del juego.
- Modos de jugo con dificultades diferentes.(normal y difícil)
- Fondo de pantalla personalizado.
- Botón de inicio con efecto parpadeo.
- Favicon.
- Fuente personalizada.

Jugar:
- Fuente de letra especial.
- CSS de colores para el fondo de los botones del select.
- Te indica la dificultad en que estás jugando.
- Favicon.
- Texto de error personalizado.
- Iconos añadidos a los títulos de las secciones.
- El turno 0 muestra un mensaje en Información de Jugadas indicando que se debe realizar una jugada, en posteriores turnos muestra
el histórico de jugadas.

Fin del Juego:
- Incluye el tipo de dificultad elegido en la información recogida.
- Gif diferentes si has ganado o perdido la partida.
- Texto personalizado en caso de ganar en el primer intento.
- Botones de volver a inicio (Vuelve a Inicio y se vuelve a elegir dificultad) o jugar de nuevo (Repites la partida con la dificultad previa)
- Favicon.
- Fuente personalizada.
- Textos de final de juego adaptados a las situaciones: ganar, perder, en modo fácil y difícil, y a haber ganado en la primera ronda.

//PENDIENTE: ***********************************************************************************************
- refactorizar los archivos css ( aún hay código compartido )


//Fuentes y Licencias  ***********************************************************************************************
Fuente css background:
https://css-tricks.com/perfect-full-page-background-image/
Múscia bajo liciencia Creative Commons: Patrick de Arteaga
https://patrickdearteaga.com/es/musica-arcade/

