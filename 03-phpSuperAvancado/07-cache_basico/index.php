<?php
// A cache é utilizada para armazenarmos num arquivo dentro
// do servidor informações de acesso do usuário ao site.
// Sua utilidade está em proporcionar maior velocidade de acesso
// e navegação do usuário que está utilizando nosso o site

  class Cache{
      private $cache;

      // Reteiro:

      // 1) Selecionar/Ler o arquivo cache
      // 2) Acrescentar um novo valor
      // 3) Salvar o arquivo

      public function setVar($nome, $valor){
        $this->readCache();
        $this->cache->$nome = $valor;
        $this->saveCache();
      }

      public function getVar($nome){
        $this->readCache();
        return $this->cache->$nome;
      }

      // Métodos auxiliares

      private function readCache(){
        $this->cache = new stdClass(); // Cria um objeto vazio

        if(file_exists('cache.cache')){
          $this->cache = json_decode(file_get_contents('cache.cache'));
                                    // Pega o arquivo cache.cache,
                                    // transforma numa string e salva
                                    // na variável $cache, após transforma
                                    // tudo num arquivo json
        }
      }

      private function saveCache(){
        file_put_contents('cache.cache', json_encode($this->cache));
                          // Transforma as informações do arquivo em texto
                          // no formato json, salva as informações num arquivo
      }
  }

$cache = new Cache();

// $cache->setVar('nome', 'Gandalf');
//$cache->setVar('idade', 1000);

echo 'Meu nome é: '.$cache->getVar('nome').'<br/>';
echo 'Idade: '.$cache->getVar('idade');


?>
