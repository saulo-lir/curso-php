<?php

// PSR-2: Coding Style Guide

/*
Essa PSR é uma extensão da PSR-1 e foca na estilização do código


1) Os códigos devem usar identação de quatro espaços (o Tab deve estar configurado para
4 espaços)

2) Cada linha deve ter no máximo 80 caracteres

3) Após a eclaração do "namespace" ou "use" deve ter sempre uma linha em branco

4) A abertura e fechamento das classes e métodos devem ser feitos na próxima linha:

Ex.:
class Carro
{

}

public function andar()
{

}

5) A visibilidade dos métodos devem ser declaradas em todas as propriedades e métodos

Ex.:

private function andar()
{

}

public function andar()
{

}

6) condicionais devem sempre ter espaços entre elas, mas funções não.

Ex.:

if (x > y){

}

function andar()
{

}

7) A abertura das condicionais devem ser na mesma linha e o fechamento na próxima.

if (x > y){

}

8) Os parâmetos de funções e métodos não devem ter espaços no início e no fim

Ex.: 
-> Correto

public function somar($x, $y)
{

}

-> Errado

public function somar( $x, $y )
{

}
*/