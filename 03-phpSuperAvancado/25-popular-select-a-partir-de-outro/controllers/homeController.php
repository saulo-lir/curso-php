<?php

class homeController extends controller{

	public function __construct(){
		
	}

	public function index(){
    	$dados = array(); 

    	$modulos = new Modulos();

    	$dados['modulos'] = $modulos->getLista();

    	$this->loadTemplate('home', $dados);
  }

  public function pegar_aulas(){  

  	$teste = 'Entrou no pegar_aulas';

  	if(isset($_POST['modulo'])){

  		$id_modulo = $_POST['modulo'];

  		$aulas = new Aulas();

  		$array = $aulas->getAulas($id_modulo);

  		echo json_encode($array); // O retorno será em json
  		exit;

  	}

  	return $teste;

  }

}
