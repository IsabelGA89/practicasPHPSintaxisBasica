<?php

require "utils.php";
/*ver_errores();*/

class Racional
{
    //Atributos
    private $numerador;
    private $denominador;

    //Constructor
    public function __construct($num = null, $den = null){
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
                        $this->numerador = (int) $num;
                        $this->denominador = (int) substr($num, strpos($num, "/") + 1);
                    }
                    break;
            }
        } else {
        $this->numerador = $num;
        $this->denominador = $den;
        }
    }


    //Métodos
    public function sumar(Racional $op1 , bool $resultado_simplificado) {
        $num = $this->numerador * $op1->denominador + $this->denominador * $op1->numerador;
        $den = $this->denominador * $op1->denominador;

        $objeto_racional = new Racional($num, $den);

        if($resultado_simplificado == true){
            $simplificado = $this->simplificar($num,$den);
            return new Racional($simplificado->numerador,$simplificado->denominador);
        }else{
            return $objeto_racional;
        }


    }
    public function restar(Racional $op1, bool $resultado_simplificado) {
        $num = $this->numerador * $op1->denominador - $this->denominador * $op1->numerador;
        $den = $this->denominador * $op1->denominador;

        $objeto_racional = new Racional($num, $den);

        if($resultado_simplificado == true){
            $simplificado = $this->simplificar($num,$den);
            return new Racional($simplificado->numerador,$simplificado->denominador);
        }else{
            return $objeto_racional;
        }
    }
    public function multiplicar(Racional $op1,bool $resultado_simplificado) {
        $num = $this->numerador * $op1->numerador;
        $den = $this->denominador * $op1->denominador;
        $objeto_racional = new Racional($num, $den);

        if($resultado_simplificado == true){
            $simplificado = $this->simplificar($num,$den);
            return new Racional($simplificado->numerador,$simplificado->denominador);
        }else{
            return $objeto_racional;
        }
    }
    public function dividir(Racional $op1,bool $resultado_simplificado) {
        $num = $this->numerador * $op1->denominador;
        $den = $this->denominador * $op1->numerador;

        $objeto_racional = new Racional($num, $den);

        if($resultado_simplificado == true){
            $simplificado = $this->simplificar($num,$den);
            return new Racional($simplificado->numerador,$simplificado->denominador);
        }else{
            return $objeto_racional;
        }
    }

    public function __toString() {
        return ("$this->numerador/$this->denominador");
    }

    public function inversa(Racional $op1){
        return new Racional($op1->denominador, $op1->numerador);
    }

    public function simplificar($numerador,$denominador){
        $maximo_comun_divisor = $this->mcd($numerador,$denominador);
        $numerador/= $maximo_comun_divisor;
        $denominador/=$maximo_comun_divisor;
        $simplificada = new Racional($numerador,$denominador);
        return $simplificada;
    }
    public function mcd($a, $b){
        $a = abs($a);
        $b = abs($b);
        if ($b == 0)
            $resultado = $a;
        else
            $resultado = $this->mcd($b, $a%$b);

        return $resultado;

    }


}