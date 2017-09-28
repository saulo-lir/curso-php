<?php
    require 'conexao.php';
?>

<html>
    <head>
        <title>PDO completo</title>
        <meta charset='utf-8'>
    </head>
    <body>
        
        <a href='adicionar.php'>ADICIONAR USUÁRIO</a>
        
        <br/><br/>
        
        <table border='1' width='100%'>
            <tr>
                <th>NOME</th>
                <th>IDADE</th>
                <th>OPÇÕES</th>
            </tr>          
    <?php
        $sql = 'SELECT * FROM pessoa';
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $usuario){
    ?>
            <tr>
                <td><?=$usuario['nome']?></td>
                <td><?=$usuario['idade']?></td>
                <td><a href='editar.php?id=<?=$usuario['id']?>'>Editar</a>--  <!-- editar.php?id =<?=$usuario['id']?> = Passa por parâmetro via GET o id do usuário -->
                <a href='excluir.php?id=<?=$usuario['id']?>'>Excluir</a></td>
            </tr>
    <?php        
            }
        }
    ?>        
                    
        </table>
    </body>
     
    
</html>
