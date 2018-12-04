<?php
/*

Essa metodologia de segurança é mais aplicada em sites antigos,
pois os sites mais modernos, feitos em MVC já possuem essa proteção

*/

require 'header.php';

if(!empty($_GET['p'])){
	require 'paginas/'.$_GET['p'].'.php';

}else{
	require 'home.php';
}

require 'footer.php';


/*

Sites antigos utilizam essa estrutura para carregar as páginas,
o que pode ser facilmente burlado, digitando no navegador por exemplo:

site.com.br/?p=../header

Ou seja, acessei propositalmente um arquivo que não era pra ser acessado

*/


// Solução 1:

if(!empty($_GET['p'])){

	// Receber o nome da página
	$pagina = $_GET['p'];

	// Verificar se o arquivo existe no sistema
	if(file_exists('paginas/'.$pagina.'.php')){
		require 'paginas/'.$_GET['p'].'.php';
	
	}else{
		require 'paginas/home.php';
	}

}else{
	require 'home.php';
}


// Solução 2 (Mais completa)

$p = 'home';

if(!empty($_GET['p'])){
	
	// Receber o nome da página
	$pagina = $_GET['p'];

	// Bloquear os pontos '.'
	if(strpos($pagina, '.') === false){ // Se a função gerar o resultado false, significa que ela encontrou o ponto

		// Verificar se o arquivo existe
		if(file_exists('paginas/'.$pagina.'.php')){
			$p = $pagina;
		
		}
	}
}

require 'paginas/'.$p.'.php';

/*

Medidas de segurança adicionais:

Entrar no php.ini, e deixar como Off as opções de abrir links externos:

allow_url_fopen = off
allow_url_include = off

Reiniciar o servidor após as mudanças

*/










