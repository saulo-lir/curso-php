<?php
// O objetivo da plataforme as a service é prover um sistema que
// pode ser usado por vários usuários, mas que é personalizado
// de acordo com o usuário que acessa. Cada usuário terá uma
// interface diferente do sistema

// O primeiro passo é criar um novo virtual host para cada
// usuário diferente. Fazemos isso no arquivo /opt/lampp/etc/extra/httpd-vhosts.conf

// Ex.:
/*
# VirtualHost do projeto1.pc

<VirtualHost *:80>
    ServerAdmin webmaster@projeto1.pc
    DocumentRoot "/opt/lampp/docs/saas"
    ServerName projeto1.pc
    ServerAlias projeto1.pc
    ErrorLog "projeto1.pc-error_log"
    CustomLog "logs/projeto1.pc-access_log" common
</VirtualHost>

OBS.: Após as mudanças no arquivo, reiniciar o servidor apache.

*/

// O segundo passo é configurar o arquivo /etc/hosts

// Inserimos as linhas:

// 127.0.0.1 projeto1.pc
// 127.0.0.1 projeto2.pc

// Para acessar o sistema: projeto1.pc/curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/index.php
// Ou: projeto2.pc/curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/index.php


try{
  $db = new PDO('mysql:dbname=saas;host=localhost;charset=utf8','root','');

}catch(PDOException $ex){
  echo 'Erro de coxexão: '.$ex->getMessage();
}

// Identificar quem está acessando o sistema através da variável super global $_SERVER

/*
print_r($_SERVER); Exibe o array contendo todas as informações da requisição da página

Array
(
    [UNIQUE_ID] => Wj5eXX8AAQEAACQ912UAAAAJ
    [HTTP_HOST] => projeto1.pc
    [HTTP_CONNECTION] => keep-alive
    [HTTP_CACHE_CONTROL] => max-age=0
    [HTTP_UPGRADE_INSECURE_REQUESTS] => 1
    [HTTP_USER_AGENT] => Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.79 Chrome/61.0.3163.79 Safari/537.36
    [HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,/*;q=0.8
    [HTTP_ACCEPT_ENCODING] => gzip, deflate
    [HTTP_ACCEPT_LANGUAGE] => pt-BR,en-US;q=0.8,en;q=0.6,pt;q=0.4
    [PATH] => /usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/snap/bin
    [LD_LIBRARY_PATH] => /opt/lampp/lib:/opt/lampp/lib
    [SERVER_SIGNATURE] =>
    [SERVER_SOFTWARE] => Apache/2.4.26 (Unix) OpenSSL/1.0.2l PHP/5.6.31 mod_perl/2.0.8-dev Perl/v5.16.3
    [SERVER_NAME] => projeto1.pc
    [SERVER_ADDR] => 127.0.0.1
    [SERVER_PORT] => 80
    [REMOTE_ADDR] => 127.0.0.1
    [DOCUMENT_ROOT] => /opt/lampp/htdocs
    [REQUEST_SCHEME] => http
    [CONTEXT_PREFIX] =>
    [CONTEXT_DOCUMENT_ROOT] => /opt/lampp/htdocs
    [SERVER_ADMIN] => you@example.com
    [SCRIPT_FILENAME] => /opt/lampp/htdocs/curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/index.php
    [REMOTE_PORT] => 45354
    [GATEWAY_INTERFACE] => CGI/1.1
    [SERVER_PROTOCOL] => HTTP/1.1
    [REQUEST_METHOD] => GET
    [QUERY_STRING] =>
    [REQUEST_URI] => /curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/
    [SCRIPT_NAME] => /curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/index.php
    [PHP_SELF] => /curso-php/03-phpSuperAvancado/13-Platform_as_a_service_(Multitenancy)/index.php
    [REQUEST_TIME_FLOAT] => 1514036829.377
    [REQUEST_TIME] => 1514036829
)
*/

// O domínio que acessou está em [HTTP_HOST] => projeto1.pc

$dominio = $_SERVER['HTTP_HOST'];

// echo 'Domínio: '.$dominio;

// Os dados selecionados do banco serão de acordo com o domínio acessado
$sql = $db->prepare("SELECT * FROM usuarios WHERE dominio = :dominio");
$sql->bindValue(':dominio', $dominio);
$sql->execute();

if($sql->rowCount() > 0){
  $cliente = $sql->fetch();

  if(file_exists('saas/clientes/'.$cliente['id'].'/index.php')){
    require 'saas/clientes/'.$cliente['id'].'/index.php';

  }else{
    echo 'Sistema fora do ar...';
  }  

}else{
  echo 'Clinte não pagou a mensalidade :/';
}
?>
