<?php
namespace Controllers;

use \Core\Controller; // Para podermos usar a classe Controller, precisamos declara-la usando seu namespace
use \Models\Usuarios;

class HomeController extends Controller {

	public function index() {
		$array = array();

		$usuarios = new Usuarios(); // new \Models\Usuarios caso não existise o "use \Models\Usuarios"
		$array['lista'] = $usuarios->getAll();

		$this->loadTemplate('home', $array);
	}

}