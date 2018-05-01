<?php
// Na estrutura MVC, o único arquivo acessado na url é
// o index.php, pois as outras páginas vão ser acessadas
// através do controller

// echo 'URL: '.$_GET['url'];

session_start();
require 'config.php';

// Ao receber uma requisição de uma classe, o spl_autoload_register irá verificar
// se essa classe existe nas pastas controllers, core ou models para poder carrega-la

spl_autoload_register(function($class){

  if(file_exists('controllers/'.$class.'.php')){
    require 'controllers/'.$class.'.php';

  }else if(file_exists('models/'.$class.'.php')){
    require 'models/'.$class.'.php';

  }else if(file_exists('core/'.$class.'.php')){
    require 'core/'.$class.'.php';
  }

});


$core = new Core();
$core->run();
