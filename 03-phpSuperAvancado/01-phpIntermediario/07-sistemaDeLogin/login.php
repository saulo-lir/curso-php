<?php
session_start();

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $dsn = 'mysql:dbname=sistemaLogin;host=localhost';
    $dbuser = 'root';
    $dbpass = '';
    
    try{
        $db = new PDO($dsn, $dbuser, $dbpass); // A conexão é estabelecida aqui
        
        $sql = $db->query("SELECT * FROM usuarios WHERE email ='$email' AND senha = '$senha'");
        
        if($sql->rowCount() > 0){ // Se a contagem de linha for maior que zero, significa que ele encontrou o usuário informado
            $dado = $sql->fetch(); // fetch() = Pega apenas a primeira linha da tabela recuperada no banco
            $_SESSION['id'] = $dado['id'];
            
            header('Location: index.php');
        }
        
    }catch(PDOException $ex){
        echo 'Erro ao acessar o banco de dados: '.$ex->getMessage();
    }
}
?>

<html>
    <head>
        <title>Sistema De Login</title>
        <meta charset='utf-8'>
    </head>
    <body>
        
        <form method='POST'>
            Email: <input type='text' name='email'><br/><br/>
            Senha: <input type='password' name='senha'><br/><br/>
            <input type='submit' value='Entrar'>
        </form>
        
    </body> 
    
</html>