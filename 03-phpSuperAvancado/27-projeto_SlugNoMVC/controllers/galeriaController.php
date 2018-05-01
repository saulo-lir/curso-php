<?php

class galeriaController extends controller{

  public function index(){
    $albuns = array();

    $a = new Album();
    $albuns['albuns'] = $a->getAlbuns();

    //print_r($albuns); exit;

    $this->loadView('galeria', $albuns);
  }

  public function abrir($slug){
  	$albuns = new Album();

  	$dados = array(
  		'info' => $albuns->getAlbum($slug)

  	);

  	$this->loadTemplate('album', $dados);
  }

}
