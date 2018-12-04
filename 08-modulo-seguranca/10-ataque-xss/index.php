<?php

/*

O ataque XSS pode ser feito através do javascript ou do banco de dados

Consiste no usuário executar um código javascript dentro do código HTML da página

Uma das consequências desse ataque é inviabilizar o acesso ao site, impedindo a tela
de carregar ou redirecionando a página para outro site por exemplo

Num formulário, o usuário pode digitar um código javascript no lugar de um texto, salvando 
esse código no banco. Quando o sistema for exibir esses dados, pode acabar executando o
javascript


Para prevenir o envio de texto malicioso, utilizamos a função htmlspecialchars() 
para sanitizar os dados e o sistema interpretar toda a informação apenas como texto puro, 
e não como script

*/


?>



<form method='GET' action="busca.php">
	Email:<br/>
	<input type="text" name="busca" /><br/><br/>

	Senha:<br/>	
	<input type="submit" value="Pesquisar" />
</form>