<?php

class loginController extends controller{

  public function index(){
    $array = array();

    $usuario = new Usuarios();

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];

        if($usuario->login($email,$senha)){
?>
        <script type='text/javascript'>window.location.href='<?= BASE_URL ?>';</script> <!-- Método javascript para redirecionar para página inicial -->
<?php
        }else{
?>
        <div class='alert alert-danger'>
            Usuário ou Senha inválidos!
        </div>
<?php
        }
    }

    $this->loadTemplate('login', $array);
  }

  public function sair(){
    unset($_SESSION['cLogin']);
    header('Location: '.BASE_URL);
  }

}

?>
