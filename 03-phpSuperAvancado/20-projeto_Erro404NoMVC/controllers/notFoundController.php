<?php

class notFoundController extends controller{

  public function index(){

    $this->loadView('404', array());
  }

}
