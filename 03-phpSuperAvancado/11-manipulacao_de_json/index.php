<?php
// Seleciona o texto contido no link e atribui na variável $jason
$json = file_get_contents('https://www.correiodoestado.com.br/climatempo/json/');
//echo $json;

$json = json_decode($json); // Decodifica o texto e transforma em json.
                            // A variável $json passa a ser um array de objetos

// print_r($json);


$obj = new StdClass(); // Iniciando um objeto vazio

$obj->codigo = 111;
$obj->cidade = 'Osaka';
$obj->uf = 'SP';
$obj->baixa = 01;
$obj->alta = 02;
$obj->ico = 02;
$obj->frase = 'Alguma frase';
$obj->data = '...';
$obj->dia_mes = 'Janeiro';
$obj->dia_semana = 'Alguma';
$obj->selecionada = 1;

$json->previsao[] = $obj;

                                // Objeto json acessando o índice previsao
echo 'Cidades retornadas: '.count($json->previsao).'<br/><br/>';

                        // $item passa a ser um objeto
foreach($json->previsao as $item){
  echo 'Cidade: '.$item->cidade.' - Baixa: '.$item->baixa.' - Alta: '.$item->alta.' - ('.$item->frase.')<br/>'; // Acessando o índice cidade de toda a array
}

/*
Conteúdo do array

[codigo] => 212
[cidade] => Campo Grande
[uf] => MS
[baixa] => 21
[alta] => 30
[ico] => 4
[frase] => Sol com muitas nuvens durante o dia. Períodos de nublado, com chuva a qualquer hora.
[data] => 21/12 Qui
[dia_mes] => 21/12
[dia_semana] => Qui
[selecionada] => 1
*/

// Tranformar o texto decodificado em json novamante

echo '<br/>'.json_encode($json);

// Outra forma:

$array = array(
  'nome'=>'Gandalf',
  'idade'=>1000,
  'endereco'=>'Terra Média',
  'frase'=>'You Shall Not Pass!'
);

echo '<br/><br/>';

echo json_encode($array);


?>
