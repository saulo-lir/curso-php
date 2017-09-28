<?php

$nome = 'Bilbo';

$nome2 = md5($nome); // Criptografia do tipo irreversível (Não retorna ao que era antes)

echo 'Nome original: '.$nome.'<br/>';

echo 'Nome criptografado em md5: '.$nome2.'<br/>';

$nome3 = base64_encode($nome); // Criptografia reversível

echo 'Nome criptografado em base64_encode: '.$nome3.'<br/>';

$nome4 = base64_decode('QmlsYm8=');

echo 'Nome descriptografado em base64_encode: '.$nome4;


?>
