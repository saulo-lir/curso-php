<?php

abstract class Animal{
    private $nome;
    private $idade;
    
    abstract protected function andar(); //Os métodos abstratos obrigatoriamente
                                        //devem ser implementados na classe que herdar essa classe abstrata
    
    public function setNome($n){
        $this->nome = $n;
    }
    
    public function getNome(){
        return $this->nome;
    }
}

class Cavalo extends Animal{
    private $pelo;
    private $patas;
   
    public function andar(){
        
    }   
   
}

$cavalo = new Cavalo();

?>