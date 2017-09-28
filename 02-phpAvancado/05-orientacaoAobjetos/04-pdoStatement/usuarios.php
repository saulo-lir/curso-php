<?php

// OBS.: O PDO Statement é utilizado quando já sabemos qual tabela vamos utilizar
// no sistema, isso torna a aplicação mais segura
// Então, esse CRUD é exclusivo da tabela usuarios

class Usuarios{
    private $db;
    
    public function __construct(){
        
        try{
            $this->db = new PDO('mysql:dbname=pdoStatement;host=localhost','root','');
        }catch(PDOException $ex){
            echo 'Erro: '.$this->db->getMessage();
        }
    }
      
    // Usando o PDO Statement
    
    // 1a forma de fazer: bindValue
    public function selecionar($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id',$id); // Associa o conteúdo da variável
        $sql->execute();
        
        $array = array();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    //2a forma de fazer: bindParam
    public function inserir($nome, $email, $senha){
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
        $sql->bindParam(':nome', $nome); //bindParam() =  Associa a variável como um todo, então caso o valor da
                                         //variável seja alterado antes do método execute(),
                                        //o valor a ser inserido no banco também mudaria, o que não acontece com bindValue, que ia permanecer o valor inicial,
                                        // mesmo a variável sendo mudada
        $sql->bindParam(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();
    }
    
    //3a forma de fazer: colocando parâmetro no execute
    public function atualizar($nome, $email, $senha, $id){
        
        $sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
        
        $sql->execute(array($nome,$email,md5($senha),$id));
    }
    
    //4a forma: bindValue com ?
    public function deletar($id){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
}

?>