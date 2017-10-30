<h1>Digite Email Ou CPF do usuário</h1>

<form method='POST'>
    <input type='text' name='campo'/>
    <input type='submit' value='Pesquisar'/>
    
</form>

<hr>

<?php
if(isset($_POST['campo']) && !empty($_POST['campo'])){
    $campo = $_POST['campo'];
    
    try{
        $pdo = new PDO('mysql:dbname=projeto_pesquisaEmVariasColunas;host=localhost','root','');
        
    }catch(PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
        exit();
    }
    
    $sql = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf"; // A pesquisa múltipla acontece aqui
    $sql = $pdo->prepare($sql); 
    $sql->bindValue(':email', $campo);
    $sql->bindValue(':cpf', $campo);
    $sql->execute();
    
    
    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
    
        echo 'Nome do usuário: '.$sql['nome'];
    }
}


?>