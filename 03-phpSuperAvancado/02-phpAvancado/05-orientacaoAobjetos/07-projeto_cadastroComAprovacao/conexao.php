<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_cadastroComAprovacao;host=localhost','root','');
  //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}

?>