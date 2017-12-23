<?php

class Calculadora{
    
    private $n;
    
    public function __construct($numeroInicial){
        $this->n = $numeroInicial;
    }
    
    public function somar($n){
        $this->n += $n;   //  $this->n = $this->n + $n;
        return $this; // Retorna o próprio objeto
    }
    
     public function subtrair($n){
        $this->n -= $n;   
        return $this; 
    }
    
     public function multiplicar($n){
        $this->n *= $n;   
        return $this; 
    }
    
     public function dividir($n){
        $this->n /= $n;   
        return $this; 
    }
    
    public function resultado(){
        return $this->n;
    }
}

$calc = new Calculadora(10);


$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2); // Recursividade de métodos
$resultado = $calc->resultado();  // 22.5

echo 'O Resultado é: '.$resultado;

?>