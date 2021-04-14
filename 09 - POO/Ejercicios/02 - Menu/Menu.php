<?php


class Menu
{
    //Atributos

    private $enlaces=array();
    private $titulos=array();

    //Constructor

    //Metodos
    //Función que guarda el enlace y el títutulo
    //dentro cada array.
    public function cargarOpcion($en,$tit)
    {
        $this->enlaces[]=$en;
        $this->titulos[]=$tit;
    }

    //Método que muestra el menú horizontal
    public function mostrarHorizontal()
    {
        for($f=0;$f<count($this->enlaces);$f++)
        {
            echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
            echo "-";
        }
    }

    //Función que muestra el menú vertical
    public function mostrarVertical()
    {
        for($f=0;$f<count($this->enlaces);$f++)
        {
            echo '<a href="'.$this->enlaces[$f].'">'.$this->titulos[$f].'</a>';
            echo "<br>";
        }
    }


}