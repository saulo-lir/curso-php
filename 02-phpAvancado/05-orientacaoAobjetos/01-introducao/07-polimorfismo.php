<?php

class Animal{
    
    public function getNome(){
        echo 'nome';
    }
}

class Cachorro extends Animal{
    
    public function getNome(){    // O polimorfismo acontece aqui, pois a classe 
        echo 'Nome do cachorro'; //Cachorro está modificando um método que ela herdou
    }
}

$cachorro = new Cachorro();

$cachorro->getNome();


?>