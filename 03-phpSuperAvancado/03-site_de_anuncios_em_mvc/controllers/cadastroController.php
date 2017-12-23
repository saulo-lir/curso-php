<?php

class cadastroController extends controller{

  public function index(){
    $dados = array();

    $this->loadTemplate('cadastro', $dados);
  }

}

?>
