<?php

class controller{

  public function loadView($viewName, $viewData = array()){

    extract($viewData); // extract: Pega os índices do array e transforma numa variável,
                        // inserindo o valor de cada índice nessa nova variável
    require 'views/'.$viewName.'.php';

  }

  // Carrega todos os templates que serão usados nas páginas
  public function loadTemplate($viewName, $viewData = array()){
    require 'views/template.php';
  }

  // Carrega todas as views que serão usadas no tamplate
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
