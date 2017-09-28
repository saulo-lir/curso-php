<?php

class Usuario{
    private $id;
    private $email;
    private $senha;
    private $nome;
    private $pdo;
    
    
    public function __construct($i= ''){
        
         try{
            $this->pdo = new PDO('mysql:dbname=usuarios;host=localhost','root','');
          //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }catch(PDOException $ex){
            echo 'Erro: '.$ex->getMessage();
          }   
        
        // Verifica se existe um usuário com esse id, para pegar seus valores no banco e preencher as variaveis da classe
        if(!empty($i)){
                  
          $sql = "SELECT * FROM usuarios WHERE id = ?";
          $sql = $this->pdo->prepare($sql);
          $sql->execute(array($i));
          
          if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
            
            $this->id = $usuario['id'];
            $this->email = $usuario['email'];
            $this->senha = $usuario['senha'];
            $this->nome = $usuario['nome'];
          }
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setEmail($e){
        $this->email = $e;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setSenha($s){
        $this->senha = md5($s);
    }
    
    public function setNome($n){
        $this->nome = $n;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function salvar(){
        //Se o id estiver preenchido, siginifica que já houve um select de usuarios                                
        if(!empty($this->id)){  //e o método salvar será usado para atualizar um usuário
            $sql = "UPDATE usuarios SET email = ?, senha = ?, nome = ? WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->email, $this->senha, $this->nome, $this->id));
        }else{
            // Se não houver id preenchido, siginifica que vai se tratar de um insert
            $sql = "INSERT INTO usuarios SET email = ?, senha = ?, nome = ?";        
            $sql = $this->pdo->prepare($sql);            
            $sql->execute(array($this->email, $this->senha, $this->nome));
        }
    }
    
    public function deletar(){ 
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($this->id));
    }
    
}


?>