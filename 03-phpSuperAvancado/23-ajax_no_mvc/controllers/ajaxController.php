<?php

class ajaxController extends controller{
	

	public function index(){
    	$dados = array();  

    	$this->loadView('ajax', $dados);
  	}  

}
