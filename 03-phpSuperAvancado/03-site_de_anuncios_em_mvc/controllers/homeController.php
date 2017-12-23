<?php

class homeController extends controller{

  public function index(){
    $dados = array();

    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categoria();

    $filtros = array(
                'categoria' => '',
                'preco' => '',
                'estado' => ''
            );

    if(isset($_GET['filtros'])){
        $filtros = $_GET['filtros']; // Não precisa do addslashes porque irá receber um array
    }

    $totalAnuncios = $a->getTotalAnuncios($filtros);
    $totalUsuarios = $u->getTotalUsuarios();

    // Criando a paginação
    $paginaAtual = 1;

    if(isset($_GET['p']) && !empty($_GET['p'])){
        $paginaAtual = addslashes($_GET['p']);
    }

    $itemPorPagina = 2;
    $totalPaginas = ceil($totalAnuncios / $itemPorPagina); // ceil: arredonda o resultado para cima

    $anuncios = $a->getUltimosAnuncios($paginaAtual, $itemPorPagina, $filtros);

    $categorias = $c->getLista();

    // Transferindo todo conteúdo que será mostrado na view

    $dados['totalAnuncios'] = $totalAnuncios;
    $dados['totalUsuarios'] = $totalUsuarios;
    $dados['categorias'] = $categorias;
    $dados['filtros'] = $filtros;
    $dados['anuncios'] = $anuncios;
    $dados['totalPaginas'] = $totalPaginas;


    $this->loadTemplate('home', $dados);
  }

}
