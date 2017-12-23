<?php
// A classe Core é o fundamento / base de todo o sistema
// Ela é o ponto de início para o funcionamento da estrutura MVC

// O core irá identificar, a partir da url que está sendo acessada,
// qual controller está sendo usado e, dentro dele, qual action (método) está sendo usada

// Estrutura de uma url em mvc:

// www.meusite.com/galeria/evento/123/etc...
//                1       / 2    / 3 / 4, 5, etc...
// 1 = controller
// 2 = action
// 3, 4, 5, etc = parâmetros

// Caso o usuário acesse a página www.meusite.com (sem nenhum parâmetro),
// então o controller padrão será o homeController (controller = homeController)

// Caso o usuário acesse a página www.meusite.com/galeria
// então o controller padrão será o galeriaController (controller = galeriaController)

// Nos dois casos acima, a action padrão será o index (action = index)

class Core{

  public function run(){

    // url padrão

    $url = '/';
    if(isset($_GET['url'])){
      $url .= $_GET['url'];
    }

    $params = array();

    if(!empty($url) && $url != '/'){ // Se alguma informação foi enviada na url
                                    // e a url não é apenas uma '/'
      $url = explode('/', $url);
      array_shift($url); // Remove o primeiro elemento da url que no caso vai ser
                         // um espaço em branco

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

    // Quando queremos executar um método dentro de uma classe, mas não sabemos o nome dele,
    // utilizamos a função call_user_func_array()

            // (Controlador que queremos usar, Action do controlador), parâmetros da Action
    call_user_func_array(array($controller, $currentAction), $params);


    /*
      echo 'CONTROLLER: '.$currentController.'<br/>';
      echo 'ACTION: '.$currentAction.'<br/>';
      echo 'PARAMS: '.print_r($params, true).'<br/>';
    */
  }

}
