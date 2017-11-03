<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_sistemaDeReservas;host=localhost','root','');
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}


?>