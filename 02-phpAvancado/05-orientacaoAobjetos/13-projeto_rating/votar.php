<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_rating;host=localhost','root','');    
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}

if(!empty($_GET['id']) && !empty($_GET['voto'])){
    $id = intval($_GET['id']); // Transforma o valor da variável em inteiro
    $voto = intval($_GET['voto']);
    
    if($voto >= 1 && $voto <= 5){
        
        $sql = $pdo->prepare("INSERT INTO votos SET id_filme = :id_filme, nota = :nota");
        $sql->bindValue(':id_filme',$id);
        $sql->bindValue(':nota',$voto);
        $sql->execute();
        
        //Atualizando média
                                                // Calcula a média
        $sql = "UPDATE filmes SET media = (select (SUM(nota)/COUNT(*)) from votos where votos.id_filme = filmes.id)
        WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();
        
        header('Location: index.php');
        exit;
    }
}



?>