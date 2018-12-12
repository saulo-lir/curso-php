<?php

// 1) Declarações de tipos:

// Com o PHP 7 é possível declarar os tipos das variáveis, como também o tipo de retorno das funções.
// Ex.:

function somar(int $a, int $b){
	return $a + $b;
}

echo "SOMA: ".somar(1, 2);

// Passando objetos nas funções:

class Numero{

}

function somar(Numero $a, float $b){
	return $a + $b;
}

$n = new Numero();

echo "SOMA: ".somar($n, 2);

// Mudando o tipo de retorno da função:

function somar(float $a, float $b):float{ // O retorno será um float
	return $a + $b;
}

