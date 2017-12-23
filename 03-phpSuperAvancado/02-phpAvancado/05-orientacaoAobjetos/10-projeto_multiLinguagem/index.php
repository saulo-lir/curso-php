<?php
session_start();


if(!empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang']; // Realiza a troca da linguagem
}

require 'conexao.php';
require 'Language.php';

$lang = new Language();

?>

<a href='index.php?lang=en'>English</a>
<a href='index.php?lang=pt-br'>Português</a>
<a href='index.php?lang=es'>Espanhol</a>
<hr/>

Linguagem Definida: <?= $lang->getLanguage()?>

<hr/>


<button><?= $lang->getTradutor('BUY') ?></button>

<br/><br/>

<a href=''><?php $lang->getTradutor('LOGOUT'); ?></a>

<br/><br/>

Categoria: <?php $lang->getTradutor('CATEGORIA_PHOTO')?>

<br/><br/>

<?php
// Listagem de categorias

$sql = "SELECT id, (select valor from lang where lang.lang = :lang and lang.nome = categorias.lang_item)
        as nome FROM categorias";
$sql = $pdo->prepare($sql);
$sql->bindValue(':lang', $lang->getLanguage());
$sql->execute();

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $categoria){
        echo $categoria['nome'].'<br/>';
    }
}

?>

