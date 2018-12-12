<?php

// Com o php 7, é possível pegar com o try catch, além de exceções, os erros 


try{

	asadsaddasd(); // Chamando função que não existe

}catch(Throwable $e){
	// Exibindo uma mensagem de retorno ao usuário
	echo "Erro: ".$e->getMessage();

	// Exibindo o arquivo que contém o erro
	echo "Erro no arquivo: ".$e->getFile();

	// Exibindo a linha que contém o erro
	echo "Erro na linha: ".$e->getLine();

	// Salvando a mensagem de erro num arquivo
	$msg = $e->getMessage().' - '.$e->getFile().' - '.$e->getLine();
	file_put_contents('log.txt', $msg);
}


// Após capturado o erro, a execução do script irá continuar normalmente
echo "Continuação do script...";