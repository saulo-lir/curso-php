<?php

interface Animal{
    
    public function andar(); // Todo método da interface deve ser público
}

class Cachorro implements Animal{
    
    public function andar(){  // Obrigatoriamente o método da interface deve ser implementado
        echo 'Estou andando...';
    }
}

$cachorro = new Cachorro();

$cachorro->andar();


?>