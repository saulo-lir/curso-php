<?php
require 'template.php';

// Array que contém os dados que serão inseridos
// dinamicamente na página

$array = array(
  'titulo' => 'Título da página',
  'nome' => 'Fulano',
  'idade' => '100'
);

$template = new Template('template.phtml');

$template->render($array);

?>
