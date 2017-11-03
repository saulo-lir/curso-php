<?php

class Carros{
    private $pdo;
    
    public function __construct($conexao){
        $this->pdo = $conexao;
    }
    
    public function listaCarros(){
        $listaCarros = array();
        
        $sql = "SELECT * FROM carros";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $listaCarros = $sql->fetchAll();
        }
                
        return $listaCarros;
    }
    
}


?>