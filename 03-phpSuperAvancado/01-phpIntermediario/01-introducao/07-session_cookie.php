<?php
session_start();  // Iniciando uma session

// Criando uma sessão

$_SESSION['teste'] = 'Bem vindo a sessão';

echo 'Minha sessão é'.$_SESSION['teste'];

echo '<br/>';
echo '<br/>';

// Criando um cookie

setcookie('teste2','Bem vindo ao cookie', time()+3600); // Nome do cookie, conteúdo, tempo de vida
echo 'Meu cookie é: '.$_COOKIE['teste2'];

echo '<br/>';
echo '<br/>';

$i = 1;

setcookie('contador',$i+1, time()+3600);

echo 'Contador: '.$_COOKIE['contador'];


?>
