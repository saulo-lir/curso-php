<?php

// 1) Forma depreciada de criar um construtor

class Carro{

	// Forma antiga de criar um construtor (Depreciado)
	function Carro(){
		echo "Classe construída!";
	}

}

// A forma atualizada é

class Carro{
	
	function __construct(){
		echo "Classe construída!";
	}

}

// 2) Uso de funções não estática de forma estática

class Carro{
	
	function rodar(){
		echo "Vrumm";
	}

}

// Antigamente era possível rodar a função diretamente, mesmo que não fosse estática
Carro::rodar();

// A forma atualizada é:

class Carro{
	
	public static function rodar(){
		echo "Vrumm";
	}

}

Carro::rodar();

