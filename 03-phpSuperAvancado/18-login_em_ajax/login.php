<?php 

try{
	$db = new PDO('mysql:dbname=projeto_login_ajax;host=localhost;charset=utf8', 'root', '');

} catch(PDOException $ex){
		echo 'Erro de conexão: '.$ex->getMessage();
}


if(isset($_POST['email']) && !empty($_POST['email'])){

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = $db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
	$sql->bindValue(':email', $email);
	$sql->bindValue(':senha', md5($senha));
	$sql->execute();

	if($sql->rowCount() > 0){
		echo "Usuário Logado com sucesso!";
	} else{
		echo "E-mail e/ou senha estão errados!";
	}

}else{
	echo "Digite um e-mail e/ou senha!";
}