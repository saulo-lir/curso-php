<?php

try{
    $pdo = new PDO('mysql:dbname=test;host=localhost','root',''); //Nome correto do banco: teste
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Obriga a classe PDO mostrar o erro interno que aconteceu
}catch(PDOException $ex){
    'Erro: '.$ex->getMessage();
}

    $sql = "SELECT * nome FROM pessoa"; 
    $sql = $pdo->query($sql);
    
    echo 'Total de pessoas: '.$sql->rowCount();
    
?>
