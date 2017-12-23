<?php
require 'usuario.php';


// Criando um usuário

$usuario = new Usuario(6);

$usuario->setEmail('caska@hotmail.com');
$usuario->setSenha('123');
$usuario->setNome('Caska');
$usuario->salvar();



// Alterando um usuário

$usuario = new Usuario(4);

$usuario->setNome('Nome Novo');
$usuario->salvar();

echo 'Usuário alterado com sucesso!';


$usuario = new Usuario(4);

$usuario->deletar();

echo 'Usuário deletado com sucesso!';

?>
