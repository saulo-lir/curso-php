<?php
// CRIAR UMA MARCA D' ÁGUA NUMA IMAGEM

$imagem = 'spike.jpg';

// Coletando o temanho da imagem original
list($largura_original,$altura_original) = getimagesize($imagem);

//Coletando o tamanho da imagem que será usada como marca d'agua
list($larguraMarcaDagua,$alturaMarcaDagua) = getimagesize('imagem-redimensionada.jpg');


$novaImagem = imagecreatetruecolor($largura_original,$altura_original);

$imagemOriginal = imagecreatefromjpeg($imagem);
$marcaDagua = imagecreatefromjpeg('imagem-redimensionada.jpg');


//Copia a imagem criada com o arquivo jpeg original para o novo arquivo de imagem vazio criado
imagecopy($novaImagem, $imagemOriginal, 0,0,0,0,$largura_original,$altura_original);

//Copia a imagem de marca d'agua para a nova imagem gerada anteriormente
                        //Posições  x, y da tela, podem ser alteradas  // x = horizontal, y = vertical
imagecopy($novaImagem, $marcaDagua, 500,0,0,0,$larguraMarcaDagua,$alturaMarcaDagua);
                                 // x, y, x, y
                                 //Posição x e y da marca d'agua, posição  e y da foto original

/* Imprimindo na tela                         
    header('Content-Type: image/jpeg');
    imagejpeg($novaImagem,null,100);
*/

imagejpeg($novaImagem,'imagemComMarcaDagua.jpeg',100);

echo 'Nova imagem gerada com sucesso!';


?>