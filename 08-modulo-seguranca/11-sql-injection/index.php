<?php

/*

O SQL Injection ocorre quando alteramos o funcionamento de uma 
query sql afim de burlar o funcionamento do sistema

*/

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";

// 1) Visualizando o SQL Injection feito no formulário de login
$sql = "SELECT * FROM users WHERE email = '' OR '1'='1' AND senha = '' OR '1'='1'";

// O que foi digitado nos campos do formulário: ' OR '1'='1

// 2) Inserindo uma query dentro da primeira, afim de danificar o sistema
$sql = "SELECT * FROM users WHERE email = '' OR '1'='1' AND senha = '' OR '1'='1';DELETE FROM users WHERE '1'='1'";

// O que foi digitado nos campos do formulário: ' OR '1'='1';DELETE FROM users WHERE '1'='1'

$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
	echo "Usuário logado!";

}else{
	echo "Usuário inválido!";
}

// Para prevenir o SQL Injection

// 1) addslashes: Adiciona uma barra antes das aspas, o que anula o efeito das aspas no dado

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

// 2) O próprio PDO já possui um mecanismo de segurança para prevenir SQL injection, 
// usando o pdo statment (prepare, bindValue, execute)

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";
$sql = $pdo->prepare($sql);
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);
$sql->execute();