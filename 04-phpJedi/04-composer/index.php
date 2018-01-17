<?php
session_start();

require 'vendor/autoload.php'; // Carrega as bibliotecas que o composer instalou
require 'config.php';

spl_autoload_register(function($class){

  if(file_exists('controllers/'.$class.'.php')){
    require 'controllers/'.$class.'.php';

  }else if(file_exists('models/'.$class.'.php')){
    require 'models/'.$class.'.php';

  }else if(file_exists('core/'.$class.'.php')){
    require 'core/'.$class.'.php';
  }

});

// A dependência monolog serve para registrarmos todos os logs de utilização da nossa página

// Instanciando a classe do monolog
$log = new Monolog\Logger('teste');
$log->pushHandler(new Monolog\Handler\StreamHandler('erros.log',Monolog\Logger::WARNING));
                                                // Será criado um arquivo chamado erros.log
// Para este exemplo, iremos registrar sempre que ocorrer um erro no sistema

$log->addError('Aviso! Deu algo errado!');


$core = new Core();
$core->run();
