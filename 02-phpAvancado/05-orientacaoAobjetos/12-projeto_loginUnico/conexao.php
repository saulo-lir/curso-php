<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_loginUnico;host=localhost','root','');
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}


?>
