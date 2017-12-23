<?php

// Ao invés de salvarmos variáveis no servidor,
// iremos salvar a página inteira

// Toda informação que for impressa na página e que estiver entre
// ob_start() e ob_end_clean(), ao invés de aparecer para o usuário,
// será salva na memória do servidor

  if(file_exists('cache.cache')){
    require 'cache.cache';

  }else{

    ob_start();
    require 'pagina.php';

    $html = ob_get_contents(); // Pega todo conteúdo gerado na página e salva na variável
    ob_end_clean();

    file_put_contents('cache.cache', $html); // Salva toda a página no arquivo cache.cache

    // Exibir as informações salvas para o usuário
    echo $html;

  }

?>
