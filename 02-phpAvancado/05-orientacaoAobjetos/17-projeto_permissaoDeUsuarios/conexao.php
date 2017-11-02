<?php

    try{
        $pdo = new PDO('mysql:dbname=projeto_permissaoDeUsuarios;host=localhost','root','');
        
    }catch(PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
        exit;
    }