<!-- 
	Essa página simula uma página online que um usuário deseja acessar,
	protegida com a técnica CSRF Token

	O CSRF Token consiste em gerar um token diferente a cada vez que o formulário for acessado.
	Esse Token será usado no formulário para verificar o sistema está sendo acessado pelo pŕoprio site dono do 
	formulário ou por site de terceiros.
	A verificação acontece comparando se o token enviado pelo formulário é igual ao token salvo na sessão.
	Caso sejam iguais, então o usuário estará apto a acessar o sistema.

-->

<?php

// Criar o token
if(!isset($_SESSION['csrf_token'])){

	$_SESSION['csrf_token'] = md5(time().rand(0,999));
}

if(!empty($_POST['email'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	// Verificação de segurança do token
	if($_POST['csrf_token'] == $_SESSION['csrf_token']){

		if($email == '@teste@gmail.com' && $senha == '123'){
		echo "ACESSO OK";

		}else{
			echo "Senha errada!";
		}

	}else{
		echo "Este form foi eniviado de outro site!";
	}
	
}

?>


<form method='POST' action="https://b7web.com.br/seg/form_online.php">
	Email:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<!-- Campo escondido que irá contem o token de verificação -->
	<input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>"/><br/><br/>

	<input type="submit" value="Enviar" />
</form>