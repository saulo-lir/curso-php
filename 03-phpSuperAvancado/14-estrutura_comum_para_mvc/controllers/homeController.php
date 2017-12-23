<?php

class homeController extends controller{

  public function index(){
    $dados = array();

    $posts = new Posts();
    $dados['posts'] = $posts->getPosts(3);

    $this->loadTemplate('home', $dados);
  }

}
