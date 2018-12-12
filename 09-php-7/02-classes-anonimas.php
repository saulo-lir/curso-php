<?php

// Classes anônimas são classes que vão ser instanciadas por uma única variável durante toda a aplicação

// Antes do PHP 7:

class Carro{

	public function getName(){
		return "Carro 1.0";
	}

}
$carro = new Carro();
echo $carro->getName();

// Depois do PHP 7:

$carro = new class{

	public function getName(){
		return "Carro 1.0";
	}

}

echo $carro->getName();

// Criando uma função que gera uma classe. Essa função será uma fábrica de classes.

function criar_carro(){

	// Criando uma classe anônima no retorno da função
	return new class{

		public function getName(){
			return "Carro 3.0";
		}

	};
}

$carro = criar_carro();
echo $carro->getName();

// Criando uma classe anônima dentro de outra classe anônima com injeção de dependência

$a = new class {
	private $carro;

	public function setCarro($carro){
		$this->carro = $carro;
	}

	public function getName(){
		return $this->carro->getName();
	}
}



$a->setCarro(new class{
	public function getName(){
		return "Carro 5.0";
	}
});

echo $a->getName();
