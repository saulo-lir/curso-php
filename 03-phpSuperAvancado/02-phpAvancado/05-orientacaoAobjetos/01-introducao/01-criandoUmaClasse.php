<?php

// Definido uma classe

class Pessoa{
    
    private $nome;
    private $idade;
    
    //Definido métodos
    
    public function trocarSenha(){ // Pode ser acessado de fora da classe
        
    }
 
    private function conectarAoBanco(){ // Só pode ser acessado de dentro da classe
        
    }
    
    protected function algumaCoisa(){  // Pode ser acessado de dentro da classe e por objetos que herdam dessa classe
        
    }
}

// Instanciando uma Classe

class Cachorro{
    
    public function latir(){
        echo 'Au au';
    }
    
}

$cachorro = new Cachorro();

// Usando um método

$cachorro->latir();

// Usar a classe sem precisar instaciar

Cachorro::latir(); // Funciona apenas com métodos públicos


// Getter e Setter, construtor

class Post{
    private $titulo;    
    private $data;
    private $corpo;
    private $comentarios;
    
    // Construtor
    public function __construct($t){
        $this->setTitulo($t); 
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function setTitulo($t){
        if(is_string($t)){ // Verifica se a variável é uma string
        $this->titulo = $t;
        }        
    }
     
}

$post = new Post();

$post->setTitulo('Testando 123...');

echo "Título: ".$post->getTitulo();


?>