<?php
session_start();
require 'conexao.php';
require 'usuarios.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));
    
    $usuario = New Usuarios($pdo);
    
    if($usuario->fazerLogin($email,$senha)){
        header('Location: index.php');
        exit;
        
    }else{
        echo 'Usuário E/OU Senha inválidos!';
    }
}
?>

<h1>Login</h1>

<form method='POST'>
    
    Email:<br/>
    <input type='email' name='email'/><br/><br/>
    
    Senha:<br/>
    <input type='password' name='senha' /><br/><br/>
    
    <input type='submit' value='Entrar' />
    
</form>