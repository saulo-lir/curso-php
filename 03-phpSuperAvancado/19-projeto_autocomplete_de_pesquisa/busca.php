<?php

try{

	$pdo = new PDO('mysql:dbname=projeto_autocomplete;host=localhost;charset=utf8','root','');

}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
	exit;
}

$array = [];

if(!empty($_POST['texto'])){
	$texto = $_POST['texto'];

	$sql = $pdo->prepare("SELECT * FROM pessoas WHERE nome LIKE :texto");
	$sql->bindValue(':texto', '%'.$texto.'%'); // Irá procurar o $texto em qualquer posição do nome
	$sql->execute();

	//print_r($sql); exit;

	if($sql->rowCount() > 0){

		foreach($sql->fetchAll() as $pessoa){
			$array[] = array('nome' => $pessoa['nome'], 'id' => $pessoa['id']);
			echo $pessoa['nome'].'<br/>';
		}

	}
}

return json_encode($array);

