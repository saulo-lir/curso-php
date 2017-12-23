
<h1>Notícias</h1>

<?php
  foreach($posts as $post){
?>
  <h3><?= $post['titulo'] ?></h3>
  <?= $post['postagem'] ?>
  <hr/>
<?php
  }
?>
