<?php

global $routes;

$routes = array();

// O padrão que nós queremos 
$routes['/galeria/{id}'] = '/galeria/abrir/:id';
						// Como o sistema irá entender

// Ex.: Ao acessarmos nossosite.com.br/galeria/qualquer-coisa, o sistema irá
// entender assim: nossosite.com.br/aleria/noticia/abrir/:titulo

$routes['/news/{titulo}'] = '/noticia/abrir/:titulo';
// Ex.: Ao acessarmos nossosite.com.br/news/qualquer-coisa, o sistema irá
// entender assim: nossosite.com.br/news/noticia/abrir/:titulo

//$routes['/cadastro/{nome}/{sobrenome}'] = '/usuarios/cadastrar/:nome/:sobrenome';

$routes['/{titulo}'] = '/noticia/abrir/:titulo';
// Ex.: Ao acessarmos nossosite.com.br/qualquer-coisa, o sistema irá
// entender assim: nossosite.com.br/noticia/abrir/:titulo

//OBS: A ordem das rotas acima é muito importante, pois o sistema
// irá verificar se a rota existe de cima para baixo
// Então se colocarmos por exemplo a terceira rota como primeira,
// Ela sempre vai ser encontrada e as outras ignoradas, pois 
// está nesse padrão /qualquer coisa