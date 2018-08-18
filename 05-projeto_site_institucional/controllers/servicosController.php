<?php

class servicosController extends controller{
  
  public function index(){
    $dados = array();    

    $this->loadTemplate('servicos', $dados);
  }


}
