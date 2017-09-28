<?php

require 'Sobre1.php';
require 'Sobre2.php';

$sobre = new Sobre(); // Vai dar erro! Não foi especificado a
                      //namespace em que a classe se encontra

$sobre = new aplicacao\v1\Sobre(); // Forma correta de instanciar uma classe de uma namespace


?>
