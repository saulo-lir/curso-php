<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_registroPorConvite;host:localhost','root','');
    
}catch(PDOException $ex){
    echo 'Erro ao conctar com o banco de dados: '.$ex->getMessage();
    exit;
}

?>