<?php
// Carregando o autoload do composer, após ter instalado ele
require __DIR__.'vendor/autoload.php';

$clienteinfo = new Loja\Clients\ClientsInfo;

echo $clienteinfo->getName();
echo $clienteinfo->getAge();