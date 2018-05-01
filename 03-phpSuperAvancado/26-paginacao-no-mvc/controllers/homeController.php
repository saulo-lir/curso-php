<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        
        $itens = new Itens();

        // Parâmetros para paginação        
        $limite = 10; // 10 itens por página

        $total = $itens->getTotal();

        $data['paginas'] = ceil($total/$limite);

        $data['paginaAtual'] = 1;

        if(!empty($_GET['p'])){
        	$data['paginaAtual'] = intval($_GET['p']);
        }

        $offset = ($data['paginaAtual'] * $limite) - $limite;

        $data['lista'] = $itens->getLista($offset, $limite);

        $this->loadTemplate('home', $data);
    }    

}