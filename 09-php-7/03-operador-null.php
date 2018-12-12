<?php

// Antes do PHP 7

$array = array(
	'nome' => 'Gandalf',
	'idade' => 1000
);

if(isset($array['idade'])){
	$idade = $array['idade'];

}else{
	$idade = '';
}

// Ou

$idade = (isset($array['idade']))? $array['idade'] : '';

echo "IDADE: ".$idade;

// Depois do PHP 7 

// Fazendo a verificação usando o operador null

$idade = $array['idade'] ?? ''; // Se existir, atribua esse valor ?? Caso contrário, atribua ''