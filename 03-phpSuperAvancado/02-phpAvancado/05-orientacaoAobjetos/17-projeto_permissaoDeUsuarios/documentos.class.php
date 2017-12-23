<?php

class Documentos{
    private $pdo;
    
    public function __construct($pdo){
        $this->pdo = $pdo;   
    }
    
    public function getDocumentos(){
        $documentos = array();
        
        $sql = "SELECT * FROM documetos";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $documentos = $sql->fetchAll();
        }
        
        
        return $documentos;
    }
}

?>