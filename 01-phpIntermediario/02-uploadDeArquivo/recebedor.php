<?php

$arquivo = $_FILES['arquivo']; // $arquivo agora será um array contendo as informaçoes do dado enviado

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
    
    $novoNome = md5(time().rand(0,99)); // O nome é gerado com a funçao time() que retorna o tempo atual em milissegundos,
                                        //concatena com a função rand() que gera um número aleatório de 0 a 99
                                        //e por último gera um código criptografado com a função md5()
    
               // Nome temporário do arquivo, Pasta que receberá o arquivo + novo nome do arquivo    
    move_uploaded_file($arquivo['tmp_name'],'arquivos/'.$novoNome);
    
    echo 'Arquivo enviado com sucesso';
}


?>
