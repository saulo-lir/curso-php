<?php
session_start();
require 'config.php';
require 'funcoes.php';

if(empty($_SESSION['login'])){
  header('Location: login.php');
  exit;
}

$id = $_SESSION['login'];

$sql = $pdo->prepare("SELECT usuarios.nome, patente.nome as p_nome
   from usuarios
   LEFT JOIN patente ON patente.id = usuarios.patente
   WHERE usuarios.id = :id");

$sql->bindValue(':id', $id);
$sql->execute();

  if($sql->rowCount() > 0){
    $sql = $sql->fetch();
    $nome = $sql['nome'];
    $p_nome = $sql['p_nome'];
  }else{
    header('Location: login.php');
    exit;
  }

$lista = listar($id, $limite);

?>

<h1>Sistema de Marketing Multinível</h1>

<h2>Usuário logado: <?=' '.$nome.' ('.$p_nome.')'?></h2>

<a href='cadastro.php'>Cadastrar Novo Usuário</a>
<br/><br/>
<a href='sair.php'>Sair</a>

<hr/>

<h4>Lista de Cadastros</h4>

<?php
  exibir($lista);
?>
