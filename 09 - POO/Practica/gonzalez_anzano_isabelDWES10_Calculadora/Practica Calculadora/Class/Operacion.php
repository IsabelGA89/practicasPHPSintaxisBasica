<?php

abstract class Operacion {

    protected $op1;
    protected $op2;
    protected $operador;
    protected $operacion;
    static protected $tipo;

    const RACIONAL = 1;
    const REAL = 2;
    const ERROR = -1;

    public static function tipoOperacion($operacion) {
        self::$tipo = Operacion::ERROR;

      /*  //Opciones de las operaciones:
        //$racional $operadorRacional $racional 1/2+1/2
        // $real $operadorReal $real
        //$entero $operadorRacional $racional;
        //$racional $operadorRacional $entero;*/
        $numReal = '[0-9]+(\.[0-9]*)?'; //1.1
        $numEntero = '[0-9]+'; // 1
        $opReal = '[\+|\-|\*|\/]'; //operaciones validas para reales

        $numRacional = '[0-9]+\/[0-9]+'; // 1/2
        $opRacional = '[\+|\-|\*|\:]';// operaciones validas para racionales

        $expresion_regular = "/^$numReal$opReal$numReal$/";
        if (preg_match($expresion_regular, $operacion)) {
            self::$tipo = Operacion::REAL;
        } else {
            $es_racional = false;

            $expresion_regular = "/^$numRacional$opRacional$numRacional$/"; // 1/2+1/2
            if (preg_match($expresion_regular, $operacion)) {
                $es_racional = true;
            }
            $expresion_regular = "/^$numRacional$opRacional$numEntero$/"; // 5/1:2
            if (preg_match($expresion_regular, $operacion)) {
                $es_racional = true;
            }
            $expresion_regular = "/^$numEntero$opRacional$numRacional$/"; // 1:1/2
            if (preg_match($expresion_regular, $operacion)) {
                $es_racional = true;
            }


            if ($es_racional == true) {
                self::$tipo = Operacion::RACIONAL;
            }
        }
        return self::$tipo;

    }

    public function __construct(string $operacion) {

        $this->operacion = $operacion;
        $this->operador = $this->obtenerOperador($operacion);
        $this->op1 = $this->obtenerOperador1($operacion);
        $this->op2 = $this->obtenerOperador2($operacion);
    }

    //Operadores
    private function obtenerOperador1($operacion) {
        $pos = strpos($operacion, $this->operador);
        return(substr($operacion, 0, $pos));
    }
    private function obtenerOperador2($operacion) {
        $pos = strpos($operacion, $this->operador);
        return (substr($operacion, $pos + 1));
    }
    private function obtenerOperador($operacion) {
        $pos = FALSE;
        if (($pos = strpos($operacion, "+")) !== FALSE) {
            $this->tipo = (strpos($operacion, "/")) ? $this::RACIONAL : $this::REAL;
            return "+";
        }
        if (($pos = strpos($operacion, "-")) !== FALSE) {
            $this->tipo = (strpos($operacion, "/")) ? $this::RACIONAL : $this::REAL;

            return "-";
        }
        if (($pos = strpos($operacion, "*")) !== FALSE) {
            $this->tipo = (strpos($operacion, "/")) ? $this::RACIONAL : $this::REAL;
            return "*";
        }
        if (($pos = strpos($operacion, ":")) !== FALSE) {
            $this->tipo = $this::RACIONAL;
            return ":";
        }
        if (($pos = strpos($operacion, "/")) !== FALSE) {
            $this->tipo = $this::REAL;
            return "/";
        }
        return $pos;
    }


    public function getOp1() {
        return $this->op1;
    }
    public function getOp2() {
        return $this->op2;
    }
    public function getOperador() {
        return $this->operador;
    }
    public function getTipo() {
        return $this->tipo;
    }

    //Otras funciones
    public function __toString() {
        return "<br />$this->op1$this->operador$this->op2 = ";
    }

    public function describe() {

        $html = "<tr><th>Operando 1 </th> <th> $this->op1</th></tr>";
        $html.="<tr><th>Operando 2 </th> <th> $this->op2</th></tr>";
        $html.="<tr><th>Operación </th> <th> $this->operador</th></tr>";
        if (self::$tipo == Operacion::RACIONAL)
            $tipo = "Racional";
        else
            $tipo = "Real";
        $html.="<tr><th>Tipo de operacion  </th> <th> $tipo</th></tr>";
        return $html;
    }

    abstract public function opera();
}
