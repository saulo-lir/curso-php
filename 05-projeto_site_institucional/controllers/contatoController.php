<?php

class contatoController extends controller{
  
  public function index(){
    $dados = array(
    	'aviso' => ''
    );

    if(isset($_POST['nome']) && !empty($_POST['nome'])){

    	$nome = addslashes($_POST['nome']);
    	$email = addslashes($_POST['email']);
    	$mensagem = addslashes($_POST['mensagem']);

    	/* Enviar Email */
    	$para = 'suporte@gmail.com';
    	$assunto = 'Dúvida';
    	$mensagem = 'Nome: '.$nome.'<br/>Email: '.$email.'<br/>Mensagem: '.$mensagem;

    	$cabecalho = 'From: suporte@gmail.com'.'\r\n'.
    				'Reply-To: '.$email.'\r\n'.
    				'X-Mailer: PHP/'.phpversion();

    	mail($para,$assunto,$mensagem,$cabecalho);

    	$dados['aviso'] = 'Email enviado com sucesso!';
    }

    $this->loadTemplate('contato', $dados);
  }



}
