<?php
require 'environment.php'; // Requisitou o arquivo que contém o ambiente que estamos trabalhando

// Array que contém as configurações do banco de dados
$config = array();

// Se o ambiente for de desenvolvimento, siginifica que estamos
// fazendo a conexão com o banco num servidor local
// Logo, as configurações de banco de dados local são diferentes das de um banco externo
if(ENVIRONMENT == 'development'){
  define('BASE_URL', 'http://localhost/curso-php/03-phpSuperAvancado/02-estrutura_mvc/'); // Define a url padrão
  $config['dbname'] = 'estrutura_mvc';
  $config['host'] = 'localhost';
  $config['charset'] = 'utf8';
  $config['dbuser'] = 'root';
  $config['dbpass'] = '';
}else{
  define('BASE_URL', 'http://meusite.com.br');
  $config['dbname'] = 'banco_do_servidor_externo';
  $config['host'] = 'endereço_externo';
  $config['dbuser'] = 'usuario_externo';
  $config['dbpass'] = 'senha_externa';
}

global $db;

try{
  $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].
  ";charset=".$config['charset'],$config['dbuser'],$config['dbpass']);

}catch(PDOException $ex){
  echo 'Erro de conexão: '.$ex->getMessage();
  exit;
}
