<?php

class Historico{
    
    private $pdo;
    
    public function __construct(){
        try{
            $this->pdo = new PDO('mysql:dbname=projeto_logDeEventos;host=localhost','root','');
        }catch(PDOException $ex){
            echo 'Erro: '.$ex->getMessage();
        }
    }
    
    public function registrar($acao){
        
        $ip = $_SERVER['REMOTE_ADDR']; // Captura o ip do PC
        
        $sql = "INSERT INTO logs SET ip = :ip, data_acao = NOW(), acao = :acao";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':ip',$ip);
        $sql->bindValue(':acao',$acao);
        $sql->execute();
    }
}


?>