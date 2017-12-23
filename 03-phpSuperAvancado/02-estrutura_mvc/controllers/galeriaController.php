<?php

class galeriaController extends controller{

  public function index(){
    $dados = array(
      'quantidade' => 130
    );

    $this->loadTemplate('galeria', $dados);
  }


}
