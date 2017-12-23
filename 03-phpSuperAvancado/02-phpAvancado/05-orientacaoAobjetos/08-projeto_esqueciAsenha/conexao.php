<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_esqueciAsenha;host=localhost','root','');
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
}


?>