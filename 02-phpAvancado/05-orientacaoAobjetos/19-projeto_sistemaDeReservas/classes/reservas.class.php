<?php

class Reservas{
    private $pdo;
    
    public function __construct($conexao){
        $this->pdo = $conexao;
    }
    
    public function listaReservas($data_inicio, $data_fim){
        $reservas = array();
        
        $sql = "SELECT * FROM reservas WHERE ( NOT(data_inicio > :data_fim OR data_fim < :data_inicio))";
        
          /** Lógica das datas
                                   data_inicio     data_fim
        Exemplo:         <--------- 01/01/2017 até 10/01/2017 ----------->
        NOT ( data_fim < data_inicio           OR            data_inicio > data_fim  )
        
                                  =  01/01/2017 até 10/01/2017   
        
        **/
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':data_inicio', $data_inicio);
        $sql->bindValue(':data_fim', $data_fim);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $reservas = $sql->fetchAll();   
        }
        
        return $reservas;
    }
    
    public function verificarDisponibilidade($carro,$data_inicio,$data_fim){
    
        $sql = "SELECT * FROM reservas WHERE id_carro = :id_carro
        AND ( NOT(data_inicio > :data_fim OR data_fim < :data_inicio))";
        
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_carro',$carro);
        $sql->bindValue(':data_inicio',$data_inicio);
        $sql->bindValue(':data_fim',$data_fim);
        $sql->execute();
        
        if($sql->rowCount() > 0){ // Se a query retornar resultados, significa que já existe uma reserva nas datas informadas
            return false;
        }else{
            return true;
        }
        
    }
    
    public function reservar($carro,$data_inicio,$data_fim, $pessoa){
        
        $sql = "INSERT INTO reservas SET id_carro = :id_carro, data_inicio = :data_inicio,
        data_fim = :data_fim, pessoa = :pessoa";
        
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_carro',$carro);
        $sql->bindValue(':data_inicio',$data_inicio);
        $sql->bindValue(':data_fim',$data_fim);
        $sql->bindValue(':pessoa',$pessoa);
        $sql->execute();
    }   
}

?>