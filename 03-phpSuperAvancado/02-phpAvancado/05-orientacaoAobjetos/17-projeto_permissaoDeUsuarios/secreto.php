<?php
session_start();
require 'conexao.php';
require 'usuarios.class.php';

if(!isset($_SESSION['logado'])){
    header('Location: login.php');
    exit;
}

$usuario = new Usuarios($pdo);
$usuario->setUsuario($_SESSION['logado']);

if($usuario->verificaPermissao('SECRET') == false){
    header('Location: index.php');
    exit;
}

?>

<h1>Página Secreta...</h1>