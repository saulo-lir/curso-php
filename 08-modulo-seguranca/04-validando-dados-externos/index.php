<?php

/* 
 
 - Funções para verificar/filtrar dados externos

 filter_var: Verificar o conteúdo de uma variável
 filter_input: Verificar dados que chegam principalmente via GET e POST
 
 - Tipos de filtros de validação (Principais)

 FILTER_VALIDATE_INT: Verifica se o dado é do tipo int
 FILTER_VALIDATE_BOOLEAN: Verifica se o dado é do tipo true ou false
 FILTER_VALIDATE_FLOAT: Verifica se o dado é do tipo float
 FILTER_VALIDATE_URL: Verifica se o texto que está na variável analisada é uma url válida
 FILTER_VALIDATE_EMAIL: Verifica se o texto que está na variável analisada é um email válido
 FILTER_VALIDATE_REGEX: Verifica se o texto que está na variável analisada é uma expressão regular
 FILTER_VALIDATE_IP: Verifica se o texto que está na variável analisada é ip válido
 
 - Tipos de filtros para sanitizar um dado (Principais)

 FILTER_SANITIZE_STRING: Sanitiza uma variável do tipo string, removendo caracteres especiais, etc.
 FILTER_SANITIZE_ENCODED: Sanitiza uma variável do tipo que possui caracteres especiais para que eles fiquem legíveis
 FILTER_SANITIZE_SPECIAL_CHARS: Caso seja enviado html dentro do texto, esse html será transformado em texto também


 Para verificar a lista completa de filtros que o php disponibiliza,
 podemos dar um print_r na função filter_list()

*/

// 1) Validando um email

 $email = 'saulo.l.nascimento@hotmail.com';

 	// dado a ser analisado, tipo de filtro
 if(filter_var($email, FILTER_VALIDATE_EMAIL)){
 	echo "É um email";
 }else{
 	echo "Não é um email";
 }

 // Obs.: O tipo de filtro é opcional. Caso ele não seja colocado, o filtro padrão será o FILTER_SANITIZE_STRING


// 2) Validando um número inteiro

 $numero = 10;

 if(filter_var($numero, FILTER_VALIDATE_INT)){
 	echo "É um inteiro";
 }else{
 	echo "Não é um inteiro";
 }


// 3) Validando texto com html

 $html = "Este é <strong>meu nome</strong>";

 $texto = filter_var($html, FILTER_SANITIZE_SPECIAL_CHARS);
 
 echo $texto; // Irá imiprimir: Este é <strong>meu nome</strong>, ao invés de deixar o "meu nome" em negrito

 // Caso se queira remover as tags html, basta usarmos a função strip_tags
 $html = strip_tags($html);


// 3) Validando com a função filter_input (Recebe os dados via get ou post e já valida eles)

 $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
 echo $email;

 // INPUT_GET para dados vindos via GET
 // INPUT_POST para dados vindos via POST

 // 4) Validando um input do tipo <select>. Devemos saber quais os valores desse select para poder fazer o filtro

 $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, array(
 	'options' => array(
 		'min_range' => 1, // Número mínimo que o select irá ter
 		'min_range' => 4, // Número máximo que o select irá ter
 		'default' => 1 // Significa que quando não for encontrado um valor dentro do intervalo definido, no caso de 1 a 4, então o valor padrão será 1
 	)
 ));

