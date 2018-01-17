<?php

class cadastroController extends controller{

  public function index(){
    $dados = array();

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        $usuario = new Usuarios();

        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)){

            if($usuario->cadastrar($nome, $email, $senha, $telefone)){
    ?>
                <div class='alert alert-success'>
                    <strong>Parabéns!</strong> Cadastrado com sucesso. <a href='<?= BASE_URL ?>login' class='alert-link'>Faça o login agora</a>
                </div>
    <?php
            }else{
    ?>
            <div class='alert alert-warning'>
                Este usuário já existe! <a href='<?= BASE_URL ?>login' class='alert-link'>Faça o login agora</a>
            </div>
    <?php
            }

        }else{
    ?>
        <div class='alert alert-warning'>
            Preencha todos os campos!
        </div>
    <?php
        }
   }

    $this->loadTemplate('cadastro', $dados);
  }

}

?>
