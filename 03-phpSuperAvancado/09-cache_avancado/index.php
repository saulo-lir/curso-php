<?php

// Além de salvarmos a página inteira em cache, iremos separar
// cada cache por páginas diferentes, e adicionar um tempo
// de expiração para estes arquivos de cache

function is_valido($cache){ // Função que verifica a validade do arquivo cache
  $ultima_modificacao = filectime($cache); // Retorna a última data de modificação em segundos
  $tempo_decorrido = time() - $ultima_modificacao;

  // Definindo um intervalo de tempo válido
  if($tempo_decorrido > 10){ // Se o cache tiver mais que 10 segundos de vida, será inválido
    return false;

  }else{
    return true;
  }

}

$p = 'pagina'; // Define o nome da página inicial

// Caso seja enviada outra página com parâmetro na url,
// então $p será alterado para essa página

if(isset($_GET['p']) && !empty($_GET['p']) && file_exists('paginas/'.$_GET['p'].'.php')){
  $p = $_GET['p'];
}

  if(file_exists('caches/'.$p.'.cache') && is_valido('caches/'.$p.'.cache')){
    require 'caches/'.$p.'.cache';

  }else{

    ob_start();
    require 'paginas/'.$p.'.php';

    $html = ob_get_contents();
    ob_end_clean();

    file_put_contents('caches/'.$p.'.cache', $html); // Cria o arquivo cache dinamicamente
                                                    // de acordo com a página acessada
    echo $html;

  }

?>
