<?php

class Core{

  public function run(){

    $url = '/';
    if(isset($_GET['url'])){
      $url .= $_GET['url'];
    }

    // As rotas são transformadas aqui

    $url = $this->checkRoutes($url);


    $params = array();

    if(!empty($url) && $url != '/'){

      $url = explode('/', $url);
      array_shift($url);

      $currentController = $url[0].'Controller';
      array_shift($url);

      if(isset($url[0]) && !empty($url[0])){
        $currentAction = $url[0];
        array_shift($url);

      }else{
        $currentAction = 'index';
      }

      if(count($url) > 0){
        $params = $url;
      }

    }else{
      $currentController = 'homeController';
      $currentAction = 'index';
    }

    $controller = new $currentController();

    call_user_func_array(array($controller, $currentAction), $params);

  }


  public function checkRoutes($url){

    global $routes;

    // print_r($routes); exit;

    foreach($routes as $pt => $newurl){

      // Identifica os argumentos ue estão entre as { } e substitui por regex (expressão regular)
      $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

      //echo $pattern; exit;

      // Verificar se a url digitada é igual ao padrão do sistema
      // Se algum resultado bater, ele é salva no array $matches
      if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1){        

       // Remove os 2 primeiros valores do $maches, pois são irrelevantes
        array_shift($matches);
        array_shift($matches);

        //Pega todos os argumentos (valores que estão dentro de {}) para associar

        $itens = array();

        if({preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)){
          $itens = preg_replace('(\{|\})', '', $m[0]);
        }

        // Faz a associação

        $arg = array();

        foreach($matches as $key => $match){
          $arg[$itens[$key]] = $match;
        }

        // Gerar a nova url

        foreach($arg as $argkey => $argkey){
          $newurl = str_replace(':'.$argkey, $argvalue, $newurl);
        }

        // echo ':URL: '.$newurl; exit;

        $url = $newurl;

        break;

      }


    }

  }

  return $url;

}
