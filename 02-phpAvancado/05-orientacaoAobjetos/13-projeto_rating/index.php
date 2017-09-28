<?php

try{
    $pdo = new PDO('mysql:dbname=projeto_rating;host=localhost','root','');    
    
}catch(PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
    exit;
}

$sql = "SELECT * FROM filmes";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $filme){
?>
    <fieldset>
        <strong><?=$filme['titulo']?></strong><br/>
        <a href='votar.php?id=<?=$filme['id']?>&voto=1'><img src='star.png' height='20'/></a>
        <a href='votar.php?id=<?=$filme['id']?>&voto=2'><img src='star.png' height='20'/></a>
        <a href='votar.php?id=<?=$filme['id']?>&voto=3'><img src='star.png' height='20'/></a>
        <a href='votar.php?id=<?=$filme['id']?>&voto=4'><img src='star.png' height='20'/></a>
        <a href='votar.php?id=<?=$filme['id']?>&voto=5'><img src='star.png' height='20'/></a>
        (<?=$filme['media']?>)
    </fieldset>


<?php
    }
}else{
   echo 'Não há filmes cadastrados :(';
}
?>