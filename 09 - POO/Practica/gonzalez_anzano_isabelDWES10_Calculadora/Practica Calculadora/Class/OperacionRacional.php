<?php

class OperacionRacional extends Operacion {

    public function __construct($operacion) {
        parent::__construct($operacion);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);
    }

    public function opera() {
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1->sumar($this->op2);
                break;
            case '-':
                $resultado = $this->op1->restar($this->op2);
                break;
            case '*':
                $resultado = $this->op1->multiplicar($this->op2);
                break;
            case ':':
                $resultado = $this->op1->dividir($this->op2);
                break;
            default :
                $resultado = false;
        }
        return $resultado;
    }

    public function __toString() {
        $output = parent::__toString();
        $output.= $this->opera();
        return $output;
    }

    public function describe() {
        $resultado = $this->opera();
        $resultado_simplificado = $resultado->simplificar();
        $resultado_inversa = $resultado->inversa($resultado);

        $html = "<table border=1><tr><th>Concepto</th> <th>Valores</th></tr>";
        $html .= parent::describe();
        $html.= "<tr><th>Resultado </th><th>" . $resultado . "</th></tr>";

        $html.= "<tr><th>Resultado simplificado</th><th>" . $resultado_simplificado. "</th></tr>";
        $html.= "<tr><th>Resultado fraccion inversa</th><th>" . $resultado_inversa. "</th></tr>";
        $html.= "</table>";

        return $html;
    }

}
