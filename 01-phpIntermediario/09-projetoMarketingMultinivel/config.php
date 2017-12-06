<?php

try{
  global $pdo;
  $pdo = new PDO('mysql:dbname=projeto_marketingMultinivel;host=localhost;charset=utf8','root','');

}catch(PDOException $ex){
  echo 'Erro de conexão: '.$ex->getMessage();
  exit;
}


$limite = 3;

$patentes = array(

);
