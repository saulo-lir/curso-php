<?php 

class vagasController extends controller{	

  	public function index(){}

  	public function listar(){
  		$array = array();

  		$t = new Vagas();
  		$array = $t->listarVagas();

  		
  		header("Content-Type: application/json");
  		echo json_encode($array);

  		// url: http://localhost/empregos-al/api/vagas/listar
  	}

    public function add(){

    }

}
