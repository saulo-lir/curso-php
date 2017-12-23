<?php
session_start();
require 'config.php';

if(!empty($_POST['email'])){
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);

  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
  $sql->bindValue(':email', $email);
  $sql->bindValue(':senha', md5($senha));
  $sql->execute();

  if($sql->rowCount() > 0){
    $sql = $sql->fetch();
    $_SESSION['login'] = $sql['id'];

    header('Location: index.php');
    exit;

  }else{
    echo 'Usuário e/ou senha incorretos...';
  }
}

?>

<form method='POST'>
  E-mail:<br/>
  <input type='email' name='email'/><br/><br/>

  Senha:<br/>
  <input type='password' name='senha'/><br/><br/>

  <input type='submit' value='Enviar'/>
</form>
