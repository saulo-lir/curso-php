<?php

try{
    global $pdo; // Permite que seja acessada pelos outros arquivos
    $pdo = new PDO('mysql:dbname=projeto_multiLinguagem;host=localhost','root','');
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}

?>