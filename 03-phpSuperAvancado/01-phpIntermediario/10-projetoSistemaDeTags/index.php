<?php

try{
  global $pdo;
  $pdo = new PDO('mysql:dbname=projeto_tags;host=localhost;charset=utf8','root','');

}catch(PDOException $ex){
  echo 'Erro de conexão: '.$ex->getMessage();
  exit;
}

$sql = $pdo->query("SELECT caracteristicas FROM usuarios");

if($sql->rowCount() > 0){
  $lista = $sql->fetchAll();

  $carac = array();

// Percorre todas as características de todos os usuários
  foreach($lista as $usuario){
    $palavras = explode(',', $usuario['caracteristicas']);

    foreach($palavras as $palavra){
      $palavra = trim($palavra); // trim = retira os espaços do começo e do fim da palavra

      if(isset($carac[$palavra])){
        $carac[$palavra]++;

      }else{
        $carac[$palavra] = 1;
      }
    }
  }

arsort($carac); // Ordena os elementos do array do maior para no menor


  $palavras = array_keys($carac);
  $contagens = array_values($carac);

  $maior = max($contagens); // Seleciona o maior número dentre os listados

  $tamanhos = array(11, 15, 20, 30); // Tamanhos em px

  for($i = 0; $i < count($palavras); $i++){

    $n = $contagens[$i] / $maior; // Cria uma proporção para cada palavra

    $h = ceil($n * count($tamanhos)); // ceil = arredonda o valor para cima

    echo "<p style='font-size:".$tamanhos[$h - 1]."px'>".$palavras[$i]." (".$contagens[$i].")</p>";

  }



}

?>
