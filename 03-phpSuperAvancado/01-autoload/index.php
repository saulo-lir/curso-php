<?php
// O autoload é usado para carregar as classes automaticamente sem precisar
// do require toda vez que for usar uma classe diferente

spl_autoload_register(function($class){ // Carrega a classe informada no parâmetro

    require 'classes/'.$class.'.class.php'; // Irá carregar qualquer classe que for
                                      //usada neste arquivo e que estiver na pasta classes
});

// As classes agora podem ser instaciadas 

$pessoa = new Pessoa();
$pessoa->falar();

$cachorro = new Cachorro();
$cachorro->latir();

?>
