<?php

class Post{
    private $titulo;    
    private $data;
    private $corpo;
    private $comentarios;
    private $qtComentarios;
     
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function setTitulo($t){
        if(is_string($t)){ // Verifica se a variável é uma string
        $this->titulo = $t;
        }        
    }
    
    public function addComentario($msg){
       $this->comentarios[] = $msg; // Cria uma array de comentários
       $this->contarComentarios();  // Chama o método auxiliar
    }
    
    public function getQuantosComentarios(){
        return $this->qtComentarios;
    }
    
    private function contarComentarios(){  // Criando método auxiliar
        $this->qtComentarios = count($this->comentarios); 
    }
}

$post = new Post();

$post->addComentario('Comantário 1');
$post->addComentario('Comantário 2');
$post->addComentario('Comantário 3');
$post->addComentario('Comantário 4');


echo 'Total de comentários:'.$post->getQuantosComentarios();
?>