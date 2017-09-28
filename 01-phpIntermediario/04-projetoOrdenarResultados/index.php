<html>

<head>
    <meta charset='utf-8'/>
    <title>Ordenação de Resultados</title>
</head>

<body>
<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_ordenar;host=localhost','root','');
     
}catch(PDOException $ex){
    echo 'Erro no banco de dados: '.$ex->getMessage();
    exit;
}

 if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
        $ordem = addslashes($_GET['ordem']);
        
        $sql = "SELECT * FROM usuarios ORDER BY ".$ordem; //Ordena pelo conteúdo da variável $ordem, que pode ser nome ou idade 
                                                         
    }else{
        $ordem = ''; // Esvazia a variável $ordem
        $sql = "SELECT * FROM usuarios";
    }

?>
                    
<form method='GET'> <!-- this.form.subimit() = função javascript -->
    <select name='ordem'  onchange="this.form.submit()"> <!-- onchange = Ao ser mudado o item, envia o formulário -->
        <option></option>   <!-- Se $ordem == 'nome', entao ele será a opção selecionada, caso contrário, não será nenhuma -->
        <option value='nome' <?php echo ($ordem=='nome')?'selected=="selected"':'';?>>PELO NOME</option>
        <option value='idade' <?php echo ($ordem=='idade')?'selected=="selected"':'';?>>PELA IDADE</option>
    </select>
</form>

<table border='1' width='400'>
    <tr>
        <th>NOME</th>
        <th>IDADE</th>
    </tr>
    <?php
       
     $sql = $pdo->query($sql);
    
    if($sql-> rowCount() > 0){
        foreach($sql->fetchAll() as $usuario):
    ?>
    
    <tr>
        <td><?=$usuario['nome']?></td>
        <td><?=$usuario['idade']?></td>
    </tr>
     
    <?php
    
    endforeach;
    }
    
    ?>
        
</table>

</body>

</html>
