<?php

class controller{

  private $config;

  public function __construct(){
    $cfg = new Config();
    $this->config = $cfg->getConfig();
  }
  
  public function loadView($viewName, $viewData = array()){

    extract($viewData); 
    require 'views/'.$viewName.'.php';

  }
  
  public function loadTemplate($viewName, $viewData = array()){
    require 'views/templates/'.$this->config['site_template'].'.php'; // Carrega os dados dinamicamente de acordo com o template
  }
 
  public function loadViewInTemplate($viewName, $viewData = array()){
    extract($viewData);
    require 'views/'.$viewName.'.php';
  }

  public function loadMenu(){
    $menu = new Menu();
    $m = array();

    $m['menu'] = $menu->getMenu();

    $this->loadView('menu', $m);
  }


}
