<?php


class Racional
{
    //Atributos numerador / denominador
    private $numRacional;
    private $numerador;
    private $denominador;

    //Constructor
    public function __construct($cadenaOrNum=null, $den = null) {
        if (is_int($cadenaOrNum)){
            if (isset($den))
                $this->racionalNumDen($cadenaOrNum, $den );
            else
                $this->racionalNum($cadenaOrNum );
        }
        else{
            if (isset($cadenaOrNum))
                $this->racionalCadena($cadenaOrNum);
            else
                $this->racionalVacio();
        }
    }

    //Métodos
    private function racionalNumDen($num, $den){
        $this->numRacional=$num."/".$den;
        $this->numerador=$num;
        $this->denominador=$den;
        $this->parse_operator_to_int();
    }
    private function racionalNum($num){
        $this->numRacional=$num."/1";
        $this->numerador=$num;
        $this->denominador=1;
        $this->parse_operator_to_int();
    }
    private function racionalCadena($cadenaOrNum){
        $this->numRacional=$cadenaOrNum;
        $pos = strpos($cadenaOrNum,"/");
        $num=substr($cadenaOrNum,0,$pos);
        $den=substr($cadenaOrNum,$pos+1);
        $this->numerador=$num;
        $this->denominador=$den;
    }
    private function racionalVacio(){
        $this->numRacional="1/1";
        $this->numerador=1;
        $this->denominador=1;
    }
    private function parse_operator_to_int(){
        settype($this->numerador, "int");
        settype($this->denominador, "int");
    }
    public function visualiza(){
        return $this->numRacional;
    }
    public function valorRacional(){
        return $this->numerador/$this->denominador;
    }
    private function simplifica(){
    }
    //Aritméticos

    public function sumar(Racional $op1) {
        $num = $this->num * $op1->den + $this->den * $op1->num;
        $den = $this->den * $op1->den;
        return new Racional($num, $den);
    }

    public function restar(Racional $op1) {
        $num = $this->num * $op1->den - $this->den * $op1->num;
        $den = $this->den * $op1->den;
        return new Racional($num, $den);
    }

    public function multiplicar(Racional $op1) {
        $num = $this->num * $op1->num;
        $den = $this->den * $op1->den;
        return new Racional($num, $den);
    }

    public function dividir(Racional $op1) {
        $num = $this->num * $op1->den;
        $den = $this->den * $op1->num;
        return new Racional($num, $den);
    }

    //Métodos mágicos
    public function __call($metodo, $argumentos) {
        if ($metodo == "asigna"){
            switch (count($argumentos)){
                case 0:
                    $this->racionalVacio();
                    break;
                case 2:
                    $this->racionalNumDen($argumentos[0], $argumentos[1]);
                    break;
                case 1:
                    if (is_int($argumentos[0]))
                        $this->racionalNum($argumentos[0]);
                    else
                        $this->racionalCadena($argumentos[0]);
                    break;
            }
        }
    }

}