<?php

require 'conexao.php';

if(isset($_POST['nome']) && !empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    
    $pdo->query("INSERT INTO usuarios SET nome = '$nome', email='$email'");
    $id = $pdo->lastInsertId(); // Captura o id do último registro inserido
    
    $md5 = md5($id);
    
    // Link de confirmação de cadastro
    $link = "localhost/curso-php/phpAvancado/orientacaoAobjetos/projeto_cadastroComAprovacao/confirmar.php?h=".$md5;
    
    // Enviar por email
    
    //$email;
    $assunto = "Confirme seu cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
    $headers = "From: morgoth@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();
    
    mail($email,$assunto,$msg,$headers);
    
    echo '<h2>Solicitação enviada, confirme seu cadastro!</h2>';
    exit;
}

?>

<form method='POST'>
    Nome:<br/>
    <input type='text' name='nome'><br/><br/>
    
    Email:<br/>
    <input type='email' name='email'><br/><br/>
    
    <input type='submit' value='Cadastrar'>
    
</form>


