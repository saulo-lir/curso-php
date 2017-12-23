<?php

    try{
        $pdo = new PDO('mysql:dbname=projeto_filtroEmTabela;host=localhost','root','');
    }catch(PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
    }
    
     //Realizar a filtragem
        if(isset($_POST['sexo']) && $_POST['sexo'] != ''){ // Caso seja usado !empty(), ele irá considerar o '0' como vazio, então não irá entrar no filtro
            $sexo = $_POST['sexo'];
            
            $sql = "SELECT * FROM usuarios WHERE sexo = :sexo";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':sexo', $sexo);
            $sql->execute();
        }else{
            $sexo = '';
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->prepare($sql);
            $sql->execute();   
        }
?>

<form method='POST'>
    <select name='sexo'>
        <option></option>
        <option value='0' <?php echo ($sexo == '0')?' selected="selected" ':''; ?>>Feminino</option> <!-- if / else embutido -->
        <option value='1' <?php echo ($sexo == '1')?' selected="selected" ':''; ?>>Masculino</option>
    </select>
    <input type='submit' value='Filtrar'/>
</form>



<table border='1' width='100%'>
    <tr>
        <th>NOME</th>
        <th>SEXO</th>
        <th>IDADE</th>
    </tr>
    
    <?php
        $sexos = array( // Converte os 0 e 1 vindos do banco em strings Feminino e Masculino
            '0' => 'Feminino',
            '1' => 'Masculino'
        );
            
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $usuario){
    ?>            
        <tr>
            <td><?=$usuario['nome']?></td>
            <td><?=$sexos[$usuario['sexo']]?></td>
            <td><?=$usuario['idade']?></td>
        </tr>    
                     
    <?php           
            }
        }
        
    ?>
    
</table>