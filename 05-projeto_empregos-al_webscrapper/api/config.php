<?php
require 'environment.php'; 
$config = array();

if(ENVIRONMENT == 'development'){
  define('BASE_URL', 'http://localhost/empregos-al/'); 
  $config['dbname'] = 'vagas_al';
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
