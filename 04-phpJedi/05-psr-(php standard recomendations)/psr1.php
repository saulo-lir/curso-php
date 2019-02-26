<?php

// PSR-1: Basic Coding Standard
// Recomendações de como organizar os arquivos e códigos nos projetos


/*

1) Os arquivos devem usar somente as tags <?php ou <?=

2) Os arquivos PHP ser salvos somente em UTF-8 sem BOM

O BOM é um conjunto de bytes que é inserido no início do arquivo,
podendo ocasionar erros ao executar o arquivo.

3) Um arquivo deve ter um objetivo específico. Ou ele contém apenas símbolos
(classes, contantes, funções) ou contém os "efeitos colaterais" das funções,
da execução da lógica,d a saída dos dados, etc.

Ex.:
-> NÃO RECOMENDADO:

    Arquivo que gera efeito colateral e que contém uma declaração de função ao mesmo
    tempo (símbolo):

    <?php
    // side effect: change ini settings
    ini_set('error_reporting', E_ALL);

    // side effect: loads a file
    include "file.php";

    // side effect: generates output
    echo "<html>\n";

    // declaration
    function foo()
    {
        // function body
    }

-> RECOMENDADO:

    O arquivo contém apenas sibolos. No caso, declaração de funções

    <?php
    // declaration
    function foo()
    {
        // function body
    }

    // conditional declaration is *not* a side effect
    if (! function_exists('bar')) {
        function bar()
        {
            // function body
        }
    }

4) Namespaces e Classes devem ser declaradas com um autoloading, e não da seguinte forma:

require "classe.php";

O correto é:

<?php
// PHP 5.3 and later:
namespace Vendor\Model;

class Foo
{
}

5) Nomes de classes, propriedades e métodos

- Nomes de classes devem ser declarados em StudlyCaps (Primeira letra maiúscula e cada palavra nova
deve começar com letra maíuscula também):

class CarroDeBrinquedo{

}

- Constantes devem ser declaradas em letar MAIÚSCULAS e separados por _ (underline)
caso seja um nome composto

const VERSION = '1.0';

- Nomes de métodos devem ser em camel case

function camelCase(){

}