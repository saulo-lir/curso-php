<?php

class Core{

  public function run(){    

    $url = '/';
    if(isset($_GET['url'])){
      $url .= $_GET['url'];
    }

    $params = array();

    if(!empty($url) && $url != '/'){ 

      $url = explode('/', $url);
      array_shift($url); 

      // Define o controller
      $currentController = $url[0].'Controller';
      array_shift($url);

      // Define a action
      if(isset($url[0]) && !empty($url[0])){ // Se existir um segundo parâmetro na url,
                                            // então a action vai ser definida
        $currentAction = $url[0];
        array_shift($url);

      }else{ // Senão, a action padrão será o index
        $currentAction = 'index';
      }

      // Define os parâmetros
      if(count($url) > 0){
        $params = $url;
      }

    }else{ // Senão, setamos o controller e a action padrão
      $currentController = 'homeController';
      $currentAction = 'index';
    }

    // Instanciando o controller de forma dinâmica
    $controller = new $currentController();
    
    call_user_func_array(array($controller, $currentAction), $params);

    /*
      echo 'CONTROLLER: '.$currentController.'<br/>';
      echo 'ACTION: '.$currentAction.'<br/>';
      echo 'PARAMS: '.print_r($params, true).'<br/>';
    */
  }

}
