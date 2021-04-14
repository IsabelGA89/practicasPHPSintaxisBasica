<?php

class OperacionReal extends Operacion
{

    public function __construct($operacion)
    {
        parent::__construct($operacion);
    }

    public function opera()
    {
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1 + $this->op2;
                break;
            case '-':
                $resultado = $this->op1 - $this->op2;
                break;
            case '*':
                $resultado = $this->op1 * $this->op2;
                break;
            case '/':
                $resultado = $this->op1 / $this->op2;
                break;
            default :
                $resultado = FALSE;
        }
        return $resultado;

    }

    public function __toString()
    {
        $output = parent::__toString();
        $output .= $this->opera() . "<br />";
        return $output;
    }

    public function describe()
    {
        $tabla_rtdo = "<table border=1><tr><th>Concepto</th> <th>Valores</th></tr>";

        $tabla_rtdo .= parent::describe();
        $tabla_rtdo .= "<tr><th>Resultado </th><th>" . $this->opera() . "</th></tr>";
        $tabla_rtdo .= "</table>";

        return $tabla_rtdo;
    }

}
