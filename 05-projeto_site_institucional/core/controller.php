<?php

class controller{
  
  public function loadView($viewName, $viewData = array()){

    extract($viewData); 
    require 'views/'.$viewName.'.php';

  }
  
  public function loadTemplate($viewName, $viewData = array()){
    require 'views/template.php';
  }
 
  public function loadViewInTemplate($viewName, $viewData = array()){
    extract($viewData);
    require 'views/'.$viewName.'.php';
  }


  /*
    OBS.: loadView() e loadViewInTemplate() tem a mesma função.
    São declarados com nomes diferentes apenas para organizar o código,
    mas usando qualquer um dos dois o efeito vai ser o mesmo
  */

}
