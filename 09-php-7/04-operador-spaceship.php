<?php

// O operador spaceship facilita a comparação entre dois números, 
// evitando a utilização do if e consequentemente economizando código

$a = 10;
$b = 20;

$r = $a <=> $b;

/*
$r == 0 -> Quando os valores forem iguais
$r == -1 -> O $a é menor que $b
$r == 1 -> O $a é MAIOR que o $b

*/