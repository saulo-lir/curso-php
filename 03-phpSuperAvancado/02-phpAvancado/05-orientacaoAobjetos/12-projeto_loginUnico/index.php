<?php
session_start();
require 'conexao.php';

if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])){
    
    $id = $_SESSION['logado'];
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $sql = "SELECT * FROM usuarios WHERE id = :id AND ip = :ip";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id',$id);
    $sql->bindValue(':ip',$ip);
    $sql->execute();
    
    if($sql->rowCount() == 0){
        header('Location: login.php');
        exit;
    }
    
}else{
    header('Location: login.php');
    exit;
}

?>

<h1>Bem vindo!</h1>