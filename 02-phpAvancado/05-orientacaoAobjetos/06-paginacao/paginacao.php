<?php

try{
    $pdo = new PDO('mysql:dbname=usuarios;host=localhost','root','');

}catch(PDOException $ex){
    echo 'ERRO: '.$ex->getMessage();
}

/* PASSO A PASSO
 1. Calcular a quantidade total de páginas
 2. Definir o $p (limite inicial da cosulta)
 3. Fazer a query com LIMIT

*/

$total = 0;

$sql = "SELECT COUNT(*) as c FROM usuarios"; // Vai retornar um registro com a quantidade de linhas na tabela
$sql = $pdo->query($sql);
$sql = $sql->fetch();

$total = $sql['c'];

$paginas = ceil($total / 10); // Total de linhas da tabela divido pelo total de linhas a serem exibidas por página

$pg = 1; // Definindo o número da primeira página

if(isset($_GET['p']) && !empty($_GET['p'])){
    $pg = addslashes($_GET['p']);
}

$p = ($pg - 1) * 10; // O contador de páginas será igual a $pg - 1 * o números de registros que queremos ter na página, no caso, 10

$sql = "SELECT * FROM usuarios LIMIT $p, 10"; // Limite inicial, limite final
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){

    foreach($sql->fetchAll() as $usuario){
        echo $usuario['nome'].' - '.$usuario['email'].'<br/>';
    }
}

echo '<hr/>';

for($i=1;$i<=$paginas;$i++){
    echo '<a href="paginacao.php?p='.$i.'">[ '.$i.' ] </a>'; // "./?p='.$i.'" : Redireciona para a mesma página enviando um $_GET[$i]
}

?>
