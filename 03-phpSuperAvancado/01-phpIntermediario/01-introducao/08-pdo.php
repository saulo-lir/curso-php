<?php

// PDO é uma biblioteca do php que gerencia as conexões com banco de dados
// PDO = PHP Data Object

$dsn = 'mysql:dbname=teste;host=localhost'; //Tipo do banco, nome, endereço do servidor
$dbuser = 'root';  //Usuário
$dbpass = '';   // Senha

try{
    $pdo = new PDO($dsn,$dbuser,$dbpass); // Cria o objeto da classe PDO com os parâmetros do banco que foi criado
    echo 'Conectado com sucesso!'.'<br/>';
    
    $sql = 'select * from pessoa';
    $sql = $pdo->query($sql);  // Executa o método query do objeto pdo
                               // query() = Usada para insert,select,update,delete 
    
    if($sql->rowCount() > 0){ // Verifica se a contagem de linhas é maior que 0
        echo 'Existem usuários cadastrados!'.'<br/>';
        
        foreach($sql->fetchAll() as $usuario){ //fetchAll = Pega todos os valores de $sql e cria um array,
                                               // copiando cada valor para $usuario
            
            echo 'Nome: '.$usuario['nome'].'<br/>';    
            echo 'Idade: '.$usuario['idade'].'<br/>';
        }
        
    }else{
        echo 'Não existem pessoas cadastrdas!'; 
    }
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
}


?>
