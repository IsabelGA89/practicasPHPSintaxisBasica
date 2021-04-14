<?php

class Racional
{

    private $numerador;
    private $denominador;

    /**
     * Racional constructor.
     * @param null $num
     * @param null $den
     * @source construimos un objeto del tipo num/den sobrecargándolo como se muestra
     *  //opciones new Racional () =>1/1
     * //opciones new Racional (5) =>5/1
     * //opciones new Racional (5,2) =>5/2
     * //opciones new Racional ("5/2") =>5/2
     * //opciones new Racional ("5") =>5/1
     */
    public function __construct($num = null, $den = null)
    {
        if (is_null($den)) {
            switch (is_numeric($num)) {
                case true:
                    $this->numerador = $num;
                    $this->denominador = 1;
                    break;
                case false:
                    if (is_null($num)) {
                        $this->numerador = 1;
                        $this->denominador = 1;
                    } else {
                        $this->numerador = (int)$num;
                        $this->denominador = (int)substr($num, strpos($num, "/") + 1);
                    }
                    break;
            }
        } else {
            $this->numerador = $num;
            $this->denominador = $den;
        }
    }

    //Operaciones
    public function sumar(Racional $op1)
    {
        $num = ($this->numerador * $op1->denominador) + ($this->denominador * $op1->numerador);
        $den = $this->denominador * $op1->denominador;

        $objeto_racional = new Racional($num, $den);

        return new Racional($objeto_racional->numerador, $objeto_racional->denominador);
    }

    public function restar(Racional $op1)
    {
        $num = $this->numerador * $op1->denominador - $this->denominador * $op1->numerador;
        $den = $this->denominador * $op1->denominador;

        $objeto_racional = new Racional($num, $den);

        return new Racional($objeto_racional->numerador, $objeto_racional->denominador);


    }

    public function multiplicar(Racional $op1)
    {
        $num = $this->numerador * $op1->numerador;
        $den = $this->denominador * $op1->denominador;
        $objeto_racional = new Racional($num, $den);
        return new Racional($objeto_racional->numerador, $objeto_racional->denominador);
    }

    public function dividir(Racional $op1)
    {
        $num = $this->numerador * $op1->denominador;
        $den = $this->denominador * $op1->numerador;
        $objeto_racional = new Racional($num, $den);

        return new Racional($objeto_racional->numerador, $objeto_racional->denominador);
    }


    public function __toString()
    {
        return ($this->numerador . "/" . $this->denominador);
    }

    public function simplificar()
    {
        $numerador = $this->numerador;
        $denominador = $this->denominador;

        $maximo_comun_divisor = $this->mcd($numerador, $denominador);

        $numerador /= $maximo_comun_divisor;
        $denominador /= $maximo_comun_divisor;
        $simplificada = new Racional($numerador, $denominador);
        return $simplificada;
    }

    private function mcd($a, $b)
    {
        $a = abs($a);
        $b = abs($b);

        if ($b == 0)
            $resultado = $a;
        else
            $resultado = $this->mcd($b, $a % $b);

        return $resultado;

    }

    public function inversa(Racional $op1)
    {
        return new Racional($op1->denominador, $op1->numerador);
    }
}
