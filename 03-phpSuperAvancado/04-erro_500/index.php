<?php

// 1a forma de identificar o erro, usada também para caso não tenhamos acesso ao arquivo php.ini

error_reporting(E_ALL); // Todo tipo de erro que acontecer, deve ser computado
ini_set('display_errors', 'On'); // Acessa o php.ini, e ativa a propriedade display_errors para On,
                                  // Exibindo assim qualquer erro que ocorrer

/*
  2a forma, identifica qual o diretório que o php.ini está

  phpinfo();
  exit;

  O endereço do diretório se encontra na linha: Configuration File (php.ini) Path	/opt/lampp/etc

*/
lkajdaksdjajskdj(); // Provocando o erro 500

/*
O erro 500 indica que houve um problema no lado
do servidor, porém o próprio servidor não sabe qual é
esse erro, e manda o aviso de erro 500 na tela

Esse erro ocorre quando o php está configurado
para não exibir erros, deixando a tela mais agradável
para o usuário quando o erro ocorrer

Devemos então configurar o arquivo php.ini para exibir exatamente
o que provocou o erro.

Identificamos a propriedade error_reporting, e descomentamos
o atributo error_reporting=E_ALL & ~E_DEPRECATED & ~E_STRICT,
após isso logo abaixo mudamos o atributo display_errors=Off para
atributo display_errors=On

Salvamos as alterações e reiniciamos o servidor

OBS.: Caso ocorra o erro 500 mesmo após essas configurações,
provavelmente o erro está no arquivo .htaccess, pois nele não é indicado
qual erro está ocorrendo, pra ele ou tá certo ou tá errado.
Então, deve-se procurar neste arquivo se alguma configuração está errada
e assim fazer as devidas correções.

*/
