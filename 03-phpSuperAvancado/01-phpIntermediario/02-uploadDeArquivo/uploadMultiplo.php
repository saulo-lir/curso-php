<?php
/*
if(isset($_FILES['arquivo'])){
    // Envio de um único arquivo
    $nome = $_FILES['arquivo']['name']; // $nome será uma string. Ex.: arquivo.jpg
    
    // Envio de múltiplos arquivos
    $nome = $_FILES['arquivo']['name']; // $nome será um ARRAY com o nome dos arquivos
}
*/

if(count($_FILES['arquivo']['tmp_name']) > 0){ // Se a contagem de arquivos detro do array $_FILES for
                                               //maior que zero, então pelo menos 1 arquivo foi enviado

    for($i=0;$i<count($_FILES['arquivo']['tmp_name']);$i++){ // Enquanto $i for menor que a quantidade de arquivos, repita o loop
       
       $novoNome = md5(time().rand(0,99));
       
        move_uploaded_file($_FILES['arquivo']['tmp_name'][$i],'arquivos/'.$novoNome);
                    //Nome temporário do arquivo  //[$i] = Posição do arquivo no array
                    
    }
     echo 'Arquivos enviados com sucesso!';
}


?>


<form method='POST' enctype='multipart/form-data'/>
   
    Arquivo:<br/>
    <input type='file' name='arquivo[]' multiple /><br/><br/>
    <!-- Adicionado colchetes após o nome arquivo, para transformar ele num array
    <!-- Adicionada a propriedade multiple -->
    <input type='submit' value='Enviar Arquivos'/>
       
</form>


