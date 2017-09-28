
<?php

session_start();
require 'conexao.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    
    $sql = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() > 0){
        $info = $sql->fetch();
        
        $_SESSION['logado'] = $info['id'];
        
        header('Location: areaRestrita.php');
        exit;
    }
}
?>

<form method='POST'>
    Login:<br/>
    <input type='text' name='email'><br/><br/>
    <input type='password' name='senha'><br/><br/>
    <input type='submit' value='Entrar'><a href='cadastro.php'> Cadastrar</a>
</form>



