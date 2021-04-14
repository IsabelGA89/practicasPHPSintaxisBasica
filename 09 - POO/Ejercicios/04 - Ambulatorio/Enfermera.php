<?php


class Enfermera extends PersonalAmbulatorio {

    //put your code here
    private $anyoTitulacion;
    private $curas = [];
    private $avisos = 0;

    public function __construct($n, $a, $d, $e, $aT=null) {
        parent::__construct($n, $a, $d, $e);
        $this->anyoTitulacion = $aT;
    }

    public function avisoMedico(Medica $medico, $mensaje) {
        $medico->pasarConsulta($this->apellido, $mensaje, 1);
        $this->avisos++;
    }

    public function hacerCura($ordenante, $tipoCura) {
        $msj = "Fecha : " . date("d-m-y", time()) . "<br/>";
        $msj .= "Ordenante $ordenante<br />";
        $msj .= "Tipo de cura $tipoCura <hr />";
        $this->curas[] = $msj;
    }


    public function __toString() {
        $msj = "<div class='enfermera'> Enfermera/o : <strong>$this->apellido, $this->nombre</strong> de $this->edad años de edad";
       if($this->anyoTitulacion != null){
           $msj .= ".  Año de obtención de la titulación <strong>$this->anyoTitulacion</strong>";
       }

        $msj .= "<div class='tituloAcciones'>Avisos médicos realizados:  " . $this->avisos . "</div>";
        $msj .= "<div class='tituloAcciones'>Curas: " . count($this->curas) . "</div>";
        $msj .= "<div class='contenidoAcciones'>";
        /*
        foreach ($this->curas as $num => $cura) {
            $msj .= "Cura $num: ";
            $msj .= "$cura<br />";
        }*/
        $msj .= "</div>";
        $msj .= "</div>";

        return $msj;
    }
}