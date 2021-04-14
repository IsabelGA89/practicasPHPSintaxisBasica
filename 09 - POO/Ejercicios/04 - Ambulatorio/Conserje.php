<?php


class Conserje extends PersonalAmbulatorio
{
    private $puesto;
    private $avisosEnfermeria = 0;

    public function __construct($n, $a, $d, $e, $p) {
        parent::__construct($n, $a, $d, $e);
        $this->puesto = $p;
    }

    public function avisoMedico(Medica $medico, $mensaje) {
        $medico->pasarConsulta($this->apellido, $mensaje, 1);
    }
    public function avisoEnfermera(Enfermera $enfermera, $mensaje) {
        $msj = "Fecha : " . date("d-m-y", time()) . "<br/>";
        $msj .= "Enfermera: $enfermera->nombre<br />";
        $msj .= "Indicaciones: $mensaje <hr />";

        $this->avisosEnfermeria++;

        return $msj;
    }

    public function mostrarPuesto(){
        return "<h5>Puesto: $this->puesto </h5>";
    }

    public function __toString() {
        $msj = "<div class='conserje'> Conserje : <strong>$this->apellido, $this->nombre</strong> de $this->edad años de edad";


        $msj .= "<div class='tituloAcciones'>Puesto asignado:  " . $this->puesto . "</div>";

        $msj .= "<div class='tituloAcciones'>Avisos a Enfermería: " . $this->avisosEnfermeria . "</div>";
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