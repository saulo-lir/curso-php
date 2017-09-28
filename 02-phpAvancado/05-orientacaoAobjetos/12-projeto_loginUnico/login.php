<?php
session_start();
require 'conexao.php';

$_SESSION['logado'] = ''; // Esvazia a session sempre que voltar para o login

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email
                         AND senha = :senha");
    $sql->bindValue(':email',$email);
    $sql->bindValue(':senha',$senha);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
        $id = $sql['id'];
        $ip = $_SERVER['REMOTE_ADDR']; // Captura o ip do PC
        
        
        $_SESSION['logado'] = $id;
        
        $sql = "UPDATE usuarios SET ip = :ip WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':ip', $ip);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        header('Location: index.php');
        exit;
        
    }
}

?>

<h1>Login</h1>

<form method='POST'>
    Email:<br/>
    <input type='email' name='email'/><br/><br/>
    Senha:<br/>
    <input type='password' name='senha'/><br/><br/>
    <input type='submit' value='Entrar'/>
</form>