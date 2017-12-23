<?php
require 'conexao.php';

if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':email',$email);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        
        $sql = $sql->fetch();
        $id = $sql['id'];
        
        $tolkien = md5(time().rand(0,99999).rand(0,99999));
        
        $sql = "INSERT INTO usuarios_tolkien (id_usuario,tolkien,expirado_em)
        VALUES (:id_usuario,:tolkien,:expirado_em)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id_usuario',$id);
        $sql->bindValue(':tolkien',$tolkien);
        $sql->bindValue(':expirado_em',date('Y-m-d H:i',strtotime('+2 months'))); // Calcula que data será daqui a 2 meses e formata no padrão especificado
        $sql->execute();
        
        // Link do site
        $link = "http://localhost/curso-php/phpAvancado/orientacaoAobjetos/projeto_esqueciAsenha/redefinir.php?tolkien=".$tolkien;
        
        $mensagem = 'Clique no link para redefinir sua senha:<br/><br/>'.$link;
        
        // Eviando o email
        
        $assunto = 'Redefinição de senha';
        
        $headers = 'From: meusite@gmail.com.br'."\r\n".
                   'X-Mailer: PHP/'.phpversion();
                   
        //mail($email,$assunto,$mensagem,$headers);
        
        echo $mensagem;
        exit;
    }
    
}

?>

<form method='POST'>
    Qual o seu email?<br/>
    <input type='email' name='email'/><br/><br/>
    <input type='submit' value='Enviar'/>
</form>