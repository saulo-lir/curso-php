<?php
session_start();
require 'conexao.php';
require 'usuarios.class.php';
require 'documentos.class.php';

if(!isset($_SESSION['logado'])){
    header('Location: login.php');
    exit;
}

$usuario = new Usuarios($pdo);
$usuario->setUsuario($_SESSION['logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();

?>

<h1>Sistema</h1>

<!-- Permissões: --> <?php // print_r($usuario->getPermissoes()); ?>

<?php if($usuario->verificaPermissao('ADD')){ ?>
    <!-- Se existir a permissão de adicionar para esse usuário, então o botão Adicionar irá aparecer -->
    <a href=''>Adicionar Documento</a> <br/><br/>

<?php
    }
?>

<a href='secreto.php' >Página Secreta...</a><br/><br/>


<table border='1' width='100%'>
    <tr>
        <th>Nome do Arquivo</th>
        <th>Ações</th>
    </tr>
    
    <?php
        foreach($lista as $arquivo){
    ?>
        <tr>
            <td> <?= utf8_encode($arquivo['titulo']); ?></td> <!-- utf8_encode(): Formata o texto no padrão utf-8 -->
            <td>
                <?php if($usuario->verificaPermissao('EDIT')){ ?>
                <!-- Se existir a permissão de editar para esse usuário, então o botão Editar irá aparecer -->
                    <a href=''>Editar</a>
                <?php } ?>
                
                <?php if($usuario->verificaPermissao('DEL')){ ?>
                <!-- Se existir a permissão de excluir para esse usuário, então o botão Excluir irá aparecer -->
                    <a href=''>Excluir</a>
                <?php } ?>    
            </td>
        </tr>
    
    <?php
        }
    ?>
  
</table>





