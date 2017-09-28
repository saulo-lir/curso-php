<?php

session_start();
require 'conexao.php';

if(empty($_SESSION['logado'])){
    header('Location: index.php');
    exit;
}

$email = '';
$codigo = '';
$sql = "SELECT email, codigo FROM usuarios WHERE id = '".$_SESSION['logado']."'";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    $info = $sql->fetch();
    $email = $info['email'];
    $codigo = $info['codigo'];
}

?>

<h1>Área restrita</h1>

<p>Usuário: <?=$email?></p><a href='sair.php'>Sair</a>

<p>Link do convite: http://localhost/curso-php/phpIntermediario/projetoRegistroPorConvite/cadastro.php?codigo=<?=$codigo?></p>




