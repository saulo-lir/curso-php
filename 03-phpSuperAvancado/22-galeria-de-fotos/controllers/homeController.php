<?php

class homeController extends controller{

	public function __construct(){
		
	}

	public function index(){
    	$dados = array(); 

    	$fotos = new Fotos();    	

    	$fotos->saveFotos();

    	$dados['fotos'] = $fotos->getFotos();

    	$this->loadTemplate('home', $dados);
  }

}
