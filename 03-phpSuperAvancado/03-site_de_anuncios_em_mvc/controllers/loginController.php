<?php

class loginController extends controller{

  public function index(){
    $array = array();

    $this->loadTemplate('login', $array);
  }

  public function sair(){
    unset($_SESSION['cLogin']);
    header('Location: '.BASE_URL);
  }

}

?>
