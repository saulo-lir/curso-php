<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_comentarios;host=localhost','root','');
}catch(PDOException $ex){
    echo 'Erro no banco de dados: '.$ex->getMessage();
    exit;
}
?>

<?php 
if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST['nome'];
    $msg = $_POST['mensagem'];
    
    $sql = $pdo->prepare("INSERT INTO mensagens (data_msg, nome, mensagem) values (NOW(),'$nome','$msg')"); // NOW() = Função SQL que retorna hora e data atuais
    
    $sql-> bindValue('nome',$nome); 
    $sql-> bindValue('mensagem',$msg);
    $sql->execute();
    
/*  É a mesma coisa fazer desse jeito:
    $sql = "INSERT INTO mensagens (data_msg, nome, mensagem) values (NOW(),'$nome','$msg')";
    $pdo->query($sql);
*/    

}
?>

<fieldset>
    <form method='POST'>
        Nome:<br/>
        <input type='text' name='nome'><br/><br/>
        
        Mensagem:<br/>
        <textarea name ='mensagem'></textarea><br/><br/>
        
        <input type='submit' value='Enviar Mensagem'>        
    </form>
        
</fieldset>

 <br/><br/>
 
<?php

$sql = 'SELECT * FROM mensagens ORDER BY data_msg DESC'; // Ordena pela data em ordem decrescente
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $mensagem){
?>
    
 <strong><?='['.$mensagem['data_msg'].'] - '?><?=$mensagem['nome']?></strong><br/>
    <?=$mensagem['mensagem']?>
    <hr/>

<?php
    }
}else{
    echo 'Não existem mensagens.';
}
?>



