<?php
require 'conexao.php';

if(!empty($_GET['tolkien'])){
    $tolkien = $_GET['tolkien'];
    
    $sql = "SELECT * FROM usuarios_tolkien WHERE tolkien = :tolkien
            AND used = 0 AND expirado_em > NOW()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':tolkien',$tolkien);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        
        $sql = $sql->fetch();
        $id = $sql['id_usuario'];
        
        // Esse if só é acionado quando o formulaŕio da nova senha for preenchido
        if(!empty($_POST['senha'])){
            $senha = $_POST['senha'];
            
            $sql = "UPDATE usuarios SET senha = ':senha' WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senha",md5($senha));
            $sql->bindValue(":id",$id);
            $sql->execute();
            
            $sql = "UPDATE usuarios__tolkien SET used = 1 WHERE tolkien = :tolkien";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':tolkien',$tolkien);
            $sql->execute();
            
            echo 'Senha alterada com sucesso!';
            exit;
        }
    ?>
    <form method='POST'>
        Digite  a nova senha:<br>
        <input type='password' name='senha'/><br/>
        <input type='submit' value='Mudar Senha'/>
    </form>
    
<?php
        
    }else{
        echo 'Tolkien invalido ou usado!';
        var_dump($_GET['tolkien']);
        exit;
    }
}

?>