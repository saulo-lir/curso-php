
1) Para evitar que os usuários acessem as pastas do sistema através de alguma url,
é recomendado que deixemos as pastas principais do sistema fora da pasta public do servidor
(public, www, htdocs, entre outras), e apenas os arquivos necessários à execução do sistema deixamos 
dentro da pasta public

2) Uma segunda abordagem (mais prática) é criar o arquivo .htaccess na raiz do sistema 
caso ele não exista e inserir o seguinte código:

Options -Indexes

Dessa forma, estaremos bloqueando que uma pasta seja acessada diretamente pela url, exibindo assim o contéudo dos diretórios, deixando o sistema vulnerável.