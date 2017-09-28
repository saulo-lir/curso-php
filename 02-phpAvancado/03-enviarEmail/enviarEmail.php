<?php

//OBS.: Para enviar o email, é necessário que o sistema esteja
//rodando num servidor externo que possua gerenciador de email

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['msg']);
    
    // Parâmetros de envio
    
    $para = 'saulo.l.nascimento@hotmail.com';
    $assunto = 'TESTE';
    $corpo  = 'Nome: '.$nome.' - '.'Email: '.$email.' - '.'Mensagem: '.$mensagem;
    
    //Cabeçalho de envio
    
                // Email do servidor de email ue hospeda o site
    $cabecalho = 'From: sehiro46@gmail.com'.'\r\n'. 
                 'Reply-To: '.$email.'\r\n'.      //Todas as respostas serão enviadas para o email de origem                       
                 'X-Mailer: PHP/'.phpversion();  //Indica qual sistema está enviando o email           
    
    // \r = Pular linha.                     
   // \n = Pular linha, ambos dependem do sistema operacional que vai rodar o código
   
   //Enviando o email
   
   mail($para,$assunto,$corpo,$cabecalho);
   
   echo '<h2>E-mail enviado com sucesso!</h2>';
   exit;
}

?>

<form method='POST'>
    Nome:<br/>
    <input type='text' name='nome'><br/><br/>
    Email:<br/>
    <input type='text' name='email'><br/><br/>
    Nos envie sua Dúvida:<br/>
    <textarea name='msg'></textarea><br/><br>
    
    <input type='submit' value='Enviar'/>
</form>
