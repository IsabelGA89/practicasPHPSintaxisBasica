<?php


class Empleado
{
    //Atributos
    private $nombre;
    private $sueldo;

    //Constructor
    public function __construct($name=null,$money=null)
    {
        $this->nombre = $name;
        $this->sueldo = $money;
    }


    //Métodos
    public function imprime_datos(){
        if($this->sueldo > 3000){
            return "Nombre: $this->nombre, debe pagar impuestos porque su sueldo es superior a 3000€ <br/>";
        }else{
            return "Nombre: $this->nombre, NO paga impuestos<br/>";
        }
    }

}