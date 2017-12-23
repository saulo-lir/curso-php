<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_usuariosOnline;host=localhost','root','');    
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}


$ip = $_SERVER['REMOTE_ADDR']; // Captura o ip do PC
$hora = date('H:i:s'); // Captura a hora atual

// Inserindo acessos no banco
$sql = $pdo->prepare("INSERT INTO acessos (ip,hora) VALUES (:ip,:hora)");
$sql->bindValue(':ip',$ip);
$sql->bindValue(':hora',$hora);
$sql->execute();

// Deletando acessos antigos no banco, para não super lotar a tabela
$sql = $pdo->prepare("DELETE FROM acessos WHERE hora < :hora");
$sql->bindValue(':hora', date('H:i:s', strtotime('-5 minutes')));
$sql->execute();

// Contando quantos usuários estão online (baseado no último acesso nos ultimos 5min)
$sql = "SELECT * FROM acessos WHERE hora > :hora GROUP BY ip";
$sql = $pdo->prepare($sql);
$sql->bindValue(':hora', date('H:i:s', strtotime('-5 minutes')));
$sql->execute();

$contagem = $sql->rowCount();

echo 'OLINE: '.$contagem;

?>





