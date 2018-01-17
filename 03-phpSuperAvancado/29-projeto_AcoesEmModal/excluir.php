<?php 

$pdo = new PDO('mysql:dbname=projeto_acoes_em_modal;host=localhost','root','');

$id = $_POST['id'];


$pdo->query("DELETE FROM usuarios WHERE id = '$id' ");

?>