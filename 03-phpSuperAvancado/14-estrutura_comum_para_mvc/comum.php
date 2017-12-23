<?php
// Sistema na estrutura comum

try{
  $pdo = new PDO('mysql:dbname=blog;host=localhost;charset=utf8','root','');

}catch(PDOException $ex){
  echo 'Erro de conexão'.$ex->getMessage();
  exit;
}

?>

<h1>Notícias</h1>

<?php

$sql = $pdo->query("SELECT * FROM posts");

if($sql->rowCount() > 0){

  foreach($sql->fetchAll() as $post){
?>
  <h3><?= $post['titulo'] ?></h3>
  <?= $post['postagem'] ?>
  <hr/>

<?php
  }
}
?>
