<?php
// O foreach é utilizado em conjunto com arrays, realizando
// um loop para percorrer toda a array e utilizar seus valores

$alunos = array('Doroty','Popeye','Brutos');

foreach($alunos as $aluno){ // Copia cada valor de $alunos para $aluno e imprime
    echo 'Aluno: '.$aluno.'<br/>';
}

echo '<br/><br/>';

$professor = array(
    'Nome' => 'Doroty',
    'Idade' => 16,
    'Cidade' => 'Mundo Mágico de Oz'
);

foreach($professor as $indice => $registro){ // Copia cada índice
   echo $indice.': '.$registro.'<br/>';  // de $aluno para $indice copia cada
                                         // registro de $aluno para $registro  
}



?>