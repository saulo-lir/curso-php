<?php

class sobreController extends controller{

	public function index(){
		$dados = array();	   

	    $this->loadTemplate('sobre', $dados);
	}

}