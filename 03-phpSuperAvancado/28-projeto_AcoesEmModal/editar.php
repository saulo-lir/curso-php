<?php

sleep(2); // Espera por 2 segundos para poder executar o restante do script

$id = $_POST['id'];

$pdo = new PDO('mysql:dbname=projeto_acoes_em_modal;host=localhost','root','');

$sql = $pdo->query("SELECT * FROM usuarios WHERE id = '$id' ");

	if($sql->rowCount() > 0){
		$usuario = $sql->fetch();
?>
	<form method='POST'>
		Nome:<br/>
		<input type='text' name='nome' value='<?=$usuario['nome']?>' /><br/><br/>
		Email:<br/>
		<input type='email' name='email' value='<?=$usuario['email']?>'/><br/><br/>
		Senha:<br/>
		<input type='text' name='senha' value='<?=$usuario['senha']?>'/><br/><br/>

		<input type='hidden' name='id' value='<?=$usuario['id']?>'/>

		<input type='submit' value='Salvar' />
	</form>

<?php
	}
?>