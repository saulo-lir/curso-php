<?php

/*

session hijacking = Sequestro de sessão

Uma sessão é salva tanto no servidor quanto num cookie do navegador,
sendo que no cookie é apenas salvo um código chamado php session, que contém a referÊncia para a sessão salva

Para visualizar de forma rápida os cookies de um naveador, podemos instalar uma 
extensão do google chrome chamada Cookie Inspector

O sequestro de sessão pode ser feito ao copiarmos o valor do cookie da sessão
de um navegador e substituirmos no cookie da sessão de outro navegador 
(utilizando o mesmo sistema por exemplo). Dessa forma, ao atualizarmos o site,
será enviado para o servidor o novo valor do cookie do navegador que estamos sequestrando a sessão, e com isso poderemos por exemplo entrar na conta de outro usuário sem precisar ter digitado o login e senha.

*/

sesson_start();

// Criando uma sessão específica para evitar o session hijacking

if(empty($_SESSION['dono'])){
					   // Endereço Ip do computador, Referência do navegador
	$_SESSION['dono'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
}

// Validando a sessão para não permitir que seja criada outra no lugar da oficial

$token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

if($_SESSION['dono'] != $token){
	exit;
}


echo "MEU SISTEMA...";

print_r($_SESSION);


/* 

Outra forma de prevenir é fazendo algumas modificações de segurança no arquivo php.ini

- Identificar a linha com o código: session.use_only_cookies= 1
caso ela esteja comentada (com ;), descomentar. Essa linha permite que 
o valor do cookie de sessão chamado PHPSESSID seja alterado via GET.
Exemplo: meusite.com.br/index.php?PHPSESSID=2ra2f2asf2safsfafsfafasdfa

- Também é uma boa prática mudar o nome do cookie de sessão, na linha: session.name = PHPSESSID, com o intuito de dificultar que o usuário identifique qual é o cookie de sessão

- Caso esse código não exista no php.ini: session.cookie_httponly= 1, devemos
inseri-lo na área de sessões, para que o cookie de sessão não seja acessível via javascript, pois existem códigos javascripts que acessam os cookie do navegador

- Caso esse código não exista no php.ini: session.cookie_secure= 1, devemos
inseri-lo na área de sessões, caso queiramos que o servidor do nosso site só receba
cookies vindos de requisições https


*/