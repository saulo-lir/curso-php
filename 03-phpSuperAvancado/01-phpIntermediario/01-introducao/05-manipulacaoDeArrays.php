<?php

// 1) array_keys() = retorna um array só com os índices/chaves do array informado no parâmetro

$array = array(
        'nome' => 'Morgoth',
        'idade' => 1000,
        'pais' => 'Terra Média'       
    );

$array2 = array_keys($array);

print_r($array2);

echo '<br/>';

// 2) array_values() = retorna um array só com os valores do array informado no parametro

$array2 = array_values($array);

print_r($array2);

echo '<br/>';

// 3) array_pop() = remove o último valor do array

$array2 = array_pop($array);

print_r($array2);

echo '<br/>';

// 4) array_shift() = remove o primeiro valor do array

$array2 = array_shift($array);

print_r($array2);

echo '<br/>';


// 5) asort() = ordena em ordem alfabética/crescente o conteúdo do array de acordo com seus valores

asort($array);

print_r($array);

// 6) arsort() = ordena em ordem inversa / decresecente

arsort($array);

print_r($array);


// 7) count() = Retorna o total de registros do array

echo '<br/>';

echo 'Total de registros: '.count($array);

echo '<br/>';

// 8) in_array() = Verifica se no array existe o valor informado no parâmetro, se sim, retorna um booleano

if(in_array('Morgoth',$array)){
    echo 'Existe Morgoth no array';
}

?>
