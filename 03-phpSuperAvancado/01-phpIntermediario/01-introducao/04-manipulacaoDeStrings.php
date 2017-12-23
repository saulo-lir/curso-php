<?php
// 1) explode() = Divide uma string em várias strings, retornando um array

$nome = 'Saulo Lira do Nascimento';

//Local onde será feito o corte, variável que contém a string
$x = explode(' ',$nome); // irá cortar o nome nos espaços em branco

$y = explode('Lira',$nome); // irá cortar o nome Lira da string

print_r($x);
print_r($y);

echo '<br/>'.$x[0]; // Irá imprimir Saulo


// 2) implode() = Faz o inverso do explode(), juntando as strings de um array numa string só

$array = array('Saulo','Lira','do','Nascimento');

$nomeCompleto = implode(' ',$array); // Junta o array com espaços em branco

echo '<br/>'.$nomeCompleto;

$nomeCompleto = implode('-',$array); //Junta o array com -

echo '<br/>'.$nomeCompleto;


// 3) number_format() = Faz o arredondamento nas casas decimais de um número inteiro

// Número que será formatado, quantidade de casas decimais, vírgula para separar casas decimais, ponto para indicar os milhares
$num = number_format(1695.54564654, 2, ',','.'); 

echo '<br/>'.$num;


// 4) str_replace() = Troca a posição das strings

$texto = 'O rato roeu a roupa';

$string = str_replace('roeu','comeu',$texto); // troca roeu por comeu

echo '<br/>'.$string;

// 5) strtolower() = Transforma a string para letras minúsculas

echo '<br/>'.strtolower('GANDALF');

// 6) strtoupper() = Transforma a string para letras MAIÚSCULAS

echo '<br/>'.strtoupper('gandalf');

// 7) substr() = Retorna uma parte de uma string

$str = 'Gandalf';

// string que será cortada, posição inicial, quantidade de casas que serão consideradas
$str2 = substr($str, 0, 3);

echo '<br/>'.$str2;

// 8) ucfirst() = Deixa a primeira letra da string MAIÚSCULA

$nom = 'gandalf';

echo '<br/>'.ucfirst($nom);

// 9) ucwords() = Deixa a primeira letra de CADA PALAVRA da string MAIÚSCULA

$nom = 'you shall not pass!';

echo '<br/>'.ucwords($nom);


?>
