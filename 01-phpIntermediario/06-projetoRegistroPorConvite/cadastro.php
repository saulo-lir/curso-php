
<?php
session_start();
require 'conexao.php';

if(!empty($_GET['codigo'])){ // Verifica se a página foi acessada através do link com código
    $codigo = addslashes($_GET['codigo']);
    $sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() == 0){
        header('Location: index.php');
        exit;
    }
}else{
    header('Location: index.php');
    exit;
}

if(isset($_POST['email']) && !empty($_POST['email'])){ // Verifcando se o email informado já existe no banco
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() <= 0){
    
        $codigo = md5(rand(0,99999).rand(0,99999));
        
        $sql = "INSERT INTO usuarios (email, senha,codigo) VALUES ('$email','$senha','$codigo')";    
        $pdo->query($sql);
    
        unset($_SESSION['logado']); // Destrói o conteúdo da sessão
        header('Location: cadastro.php');       
    }  
}

?>

<h1>Cadastro</h1>

<form method='POST'>
    Email:<br/>
    <input type='text'name='email'><br/><br/>
    Senha:<br/>
    <input type='password'name='senha'><br/><br/>
    <input type='submit' value='Cadastrar'>    
</form>