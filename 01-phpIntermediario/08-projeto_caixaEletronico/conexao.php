<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_caixaEletronico;host=localhost','root','');
}catch(PDOException $ex){
    echo 'Erro de conexão com o banco: '.$ex->getMessage();
    exit;
}

?>