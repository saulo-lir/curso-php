<?php

// Arquivo que realiza a conexão com o banco de dados

$dsn = 'mysql:dbname=teste;host=localhost'; //dsn = Data Source Name
$dbuser = 'root';
$dbpass = '';

try{
    $pdo = new PDO($dsn,$dbuser,$dbpass);
    
}catch(PDOEception $ex){
    echo 'Erro ao conectar com o Banco de Dados!';
}

?>