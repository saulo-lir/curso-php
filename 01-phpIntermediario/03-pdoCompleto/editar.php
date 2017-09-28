<?php
require 'conexao.php';


if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $idade = addslashes($_POST['idade']);
    
    $sql = "UPDATE pessoa SET nome = '$nome', idade = '$idade' WHERE id = '$id'";
    $pdo->query($sql);
    
    header('Location: index.php');
}

    $sql = "SELECT * FROM pessoa WHERE id = '$id'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() > 0){
        $dado = $sql->fetch(); // fetch() = Captura apenas a primeira linha da tabela (que no caso é a única)
    }else{
        header('Location: index.php');
    }
      
?>

<html>
    <head>
        <title>Editar Usuário</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <form method='POST'>
            NOME:<input type='text' name='nome' value='<?=$dado['nome']?>'><br/>
            IDADE:<input type='text' name='idade' value='<?=$dado['idade']?>'><br/>
            <input type='submit' value='ATUALIZAR'><br/>
        </form>
    </body>
</html>