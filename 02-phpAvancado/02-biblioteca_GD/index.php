<?php

// RESIMENSIONANDO UMA IMAGEM

$imagem = 'spike.jpg'; // Imagem do projeto

$largura = 200; // largura máxima que a imagem pode ter

$altura = 200; //altura máxima que a imagem pode ter

list($largura_original,$altura_original) = getimagesize($imagem); // getimagesize() = retorna um array com duas propriedades,
                                                                  //largura e altua da imagem
                                                                 //list = recebe os dois valores e guarda nas duas variáveis do parâmetro

$ratio = $largura_original / $altura_original; // Proporção entre largura e altura


// Aqui é calculado e gerado os novos valores para largura e altura
if($largura/$altura > $ratio){ // Se o ratio (proporção) da futura imagem for maior que o ratio da imagem original, faça...
   $largura = $altura * $ratio;
}else{
    $altura = $largura / $ratio;
}

echo 'Largura original: '.$largura_original.' - Altura original: '.$altura_original.'<br/>';
echo 'Nova largura: '.$largura.' - Nova altura: '.$altura.'<br/>';


$novaImagem = imagecreatetruecolor($largura,$altura); // Função da biblioteca GD, cria uma nova imagem com a largura e altura informados

$imagemOriginal = imagecreatefromjpeg($imagem);  // Cria uma imagem a partir da imagem original informada
                                                // Se fosse uma imagem no formato png, ficaria: imagecreatefrompng()
                                                

// Especifica que existirá um fundo transparente na tela

imagealphablending($novaImagem, false);
imagesavealpha($novaImagem, true);



// imagecopyresampled() : Redimensiona e ajusta os pixels, deixando a nova imagem proporcional e com qualidade boa 

// imagecopyresized() : Apenas redimensiona a imagem, não se preocupa com a qualidade

imagecopyresampled($novaImagem,$imagemOriginal, // Será copiada a imagem original para a nova imagem, que está vazia. Essa cópia só acontece depois de calculado os próximos parâmetros
                   0,0,0,0,  // Corresponde as posições que será inserida a imagem       
                   $largura,$altura,$largura_original,$altura_original // Corresponde às novas largura e alturas criadas anteriormente
                 );                                            
   
   
header('Content-Type: image/jpeg'); // Informa ao navegador o este arquivo index.php vai ser num arquivo de imagem
   
//Imagem,diretório,qualidade (pode variar entre  70, 80, 100)  
          
imagejpeg($novaImagem, null, 100); // Exibe a imagem na tela. Caso seja informado o diretório, irá salvar nesse diretório 
                                   // Se fosse png, ficaria: imagepng($novaImagem,null), desconsiderando o parâmetro da qualidade, que nesse caso é sempre 100
                                   
                                    
imagejpeg($novaImagem, 'imagem-redimensionada.jpg', 100);   // Apenas salva a imagem, não exibe na tela                                 
  
echo 'Imagem redimensionada com sucesso!';
                                    
?>
