<?php

class galeriaController extends controller{

  public function index(){
    $albuns = array();

    $a = new Album();
    $albuns['albuns'] = $a->getAlbuns();  

    $this->loadView('galeria', $albuns);
  }

}
