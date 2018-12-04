<?php

/*

Crawlers são robôs (computadores) de busca que navegam 24h nos sites da web, 
afim de adicioná-los na base de dados do google.

Eles fazem a varredura completa dos sites para jogá-los no google.

Nem todas as pastas e arquivos são interessantes que sejam adicionadas ao google,
então é necessário que se aplique um controle no site/sistema para que os crawlers
não coletem todos os arquivos que eles encontrarem

O primeiro arquivo que os crawlers procuram ao encontrar o domínio do site 
é o robots.txt (seutite.com.br/robots.txt). É nesse arquivo que inserimos as 
regras do que pode ou não ser acessado pelos crawlers

Definindo as regras:

1- Em qual mecanismo de busca será aplicado as regras (Google, Yahoo, etc).

Para o google: User-agent: Googlebot
Para o yahoo: User-agent: Slurp
Para o bing: User-agent: Bingbot
Para todos: User-agent: *

2- Regras que queremos

Disallow: /admin = Bloqueia a pasta admin
Allow: /teste.php = Permite a indexação pelo motor de busca


Para vermos um exemplo, podemos acessar o robots.txt do facebook:
httpr://www.facebook.com/robots.txt

*/