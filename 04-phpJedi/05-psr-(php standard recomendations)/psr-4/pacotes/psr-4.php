<?php
// PSR-4 Autoloader: Especifica o autocarregamento das classes

/* Um nome de classe totalmente qualificado possui o seguinte formato:

\<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>

NamespaceName = Vendor Name.

*/

spl_autoload_register(function($class){
    $base_dir = __DIR__.'/pacotes/';
    $file = $base_dir.str_replace('\\', '/', $class).'.php';

    if(file_exists($file)){
        require($file);
    }
});

// Para carregar a classe que queremos, bastamos indicar o namespace da classe seguido do nome da classe
$clienteinfo = new Loja\Clients\ClientsInfo;

echo $clienteinfo->getName();
echo $clienteinfo->getAge();