<?php 

/*

Prevenir o sistema contra ataque de força bruta

 As melhores formas de prevenir são:

 - Bloquear após algumas tentativas de login;
 - Através de um captcha, que pode ser exibido após algumas tentativas de login

*/

session_start();

if(!empty($_POST['email'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	// Caso tenha excedido o número de tentativas de login permitidas, bloqueia o usuário
	if(isset($_SESSION['login']) && $_SESSION['login'] >= 3){
		echo "Seu acesso esté bloqueado!";

	}else{

		if($email == '@teste@gmail.com' && $senha == '123'){
			echo "ACESSO OK";
	
		}else{

			// Salvar na sessão o número de tentativas de login

			// Criar a sessão caso ela não exista
			if(!isset($_SESSION['login'])){
				$_SESSION['login'] = 0;
			}

			// Incrementar a sessão, fazendo assim a contagem
			$_SESSION['login']++;

			echo "Senha errada! Tentativas: "+$_SESSION['login'];
		}

	}
	
	echo "<hr/>";
}

?>

<form method='POST'>
	Email:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>
	<input type="submit" value="Enviar" />
</form>