<?php
session_start();

//Transformar o arquivo php numa imagem
//header('Content-type: image/jpeg');

$n = $_SESSION['captcha'];

$imagem = imagecreate(100, 50); // Cria a imagem com 100px de largura e 50px de altura

imagecolorallocate($imagem, 200, 200, 200); // Adiciona cor Cinza à imagem

$fontecolor = imagecolorallocate($imagem,20,20,20); // Adiciona a cor preto claro que será usada na fonte à imagem

imagettftext($imagem, 40, 0, 21, 35, $fontecolor, 'Ginga.otf', $n); //Cria a fonte e adiciona à imagem

imagejpeg($imagem, null, 100); // Exibe a imagem

?>