<?php

try{
	$pdo = new PDO('mysql:dbname=projeto_notificacoes;host=localhost','root','');
}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
	exit;
}

// Verificar se existem notificações não lidas, ou seja, igual a 0

$sql = "SELECT * FROM notificacoes WHERE id_user = '1' AND lido = '0' ";
$sql = $pdo->query($sql);

$array = array('qt'=>0);

if($sql->rowCount() > 0){

	$array['qt'] = $sql->rowCount();

}

echo json_encode($array);

exit;