<?php
session_start();
require 'config.php';

  if(!empty($_POST['nome']) && !empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $idPai = $_SESSION['login'];
    $senha = md5($email);

    $sql = $pdo->prepare("SELECT * from usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() == 0){
      $sql = $pdo->prepare("INSERT INTO usuarios SET id_pai = :id_pai, nome = :nome,
        email = :email, senha = :senha");
      $sql->bindValue(':id_pai', $idPai);
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':senha', $senha);
      $sql->execute();

      header('Location: index.php');

    }else{
      echo 'Esse email já está cadastrado no sistema!';
    }

  }

?>

<h1>Cadastrar Novo Usuário</h1>

<form method='POST'>
  Nome:<br/>
  <input type='text' name='nome'/><br/><br/>

  E-mail:<br/>
  <input type='email' name='email'/><br/><br/>

  <input type='submit' value='Cadastrar'/>
</form>
