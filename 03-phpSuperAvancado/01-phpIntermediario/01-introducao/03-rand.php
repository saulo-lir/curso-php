<?php

$candidatos = array('Doroty','Popeye','Brutos','Guts','Caska');

$x = rand(0,4);  // Função que gera um número aleatório dentre
                 // o intervalo informado

echo 'O felizardo é: '.$candidatos[$x];

?>