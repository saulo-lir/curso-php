<?php
/*

O intuito da criptografia é dificultar que a senha seja decifrada
por quem eventualmente consiga o acesso ao banco de dados do sistema com as senhas


O MD5 embora seja seguro, não é recomendado pela própria documentação do PHP
para salvar senhas, pois como é uma criptografia de alta velocidade, acaba 
facilitando os ataques de força bruta, pois as tentativas de acertos de senhas
vão ser mais rápidas. Isso só será possível obviamente se o sistema não tiver
mecanismos de proteção contra ataques de força bruta.

O MD5 tem a vantagem de ser utilizado por várias linguagens de programação,
incluindo no banco de dados com o MysSQL, o que facilita bastante a implementação
de sistemas e a comunicação entre eles.

As criptografias mais recomendadas pela documentação do PHP são a PASSWORD_DEFAULT 
e CRYPT_BLOWFISH, que são implementadas através da função password_hash()

A desvantagem é que o Mysql não tem suporte a essas criptografias, o que torna necessário
adaptar o código para fazer por exemplo o sistema de login funcionar

----------------------------------------------------------------------------------------

PASSWORD_DEFAULT - Usa o algoritmo bcrypt (padrão desde o PHP 5.5.0). Perceba que essa constante foi desenhada para mudar ao longo do tempo a medida que novos algoritmos mais fortes forem adicionados ao PHP. Por essa razão, o comprimento do resultado da utilização desse identificador pode mudar ao longo do tempo. Por isso, é recomendado que armazene o resultado em uma coluna do banco de dados que possa ser expandida além dos 60 caracteres (255 caracteres seria uma boa escolha).

PASSWORD_BCRYPT - Usa o algoritmo CRYPT_BLOWFISH para criar o hash. Produzirá um hash compatível com o padrão crypt() usando o identificador "$2y$". O resultado será sempre uma string de 60 caracteres, ou FALSE em caso de falha.

http://php.net/manual/pt_BR/function.password-hash.php

*/

// Implementando a função password_hash()

$hash = password_hash("123456", PASSWORD_BCRYPT);

//$hash == '$2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU/DEF/YNQ2uOZflMIa'

// Fazendo a validação da senha no sistema de login

// Dados recebidos do usuário
$email = 'teste@gmail.com';
$senha = '123456';

// Pegar os dados do usuário. Não é necessário filtrar pela senha já que o MySQL não reconhece a criptografia
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() > 0){
	$dados = $sql->fetch();

	// Validação da senha
	if(password_verify($senha, $dados['senha'])){
		echo "ACERTOU O LOGIN!";
	}else{
		echo "ERROU O LOGIN";
	}

}

?>
