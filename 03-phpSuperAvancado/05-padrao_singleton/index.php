<?php
// O padrão singleton é utilizado quando se tem uma classe
// em que não se pode ter várias instânticas dela

// Então por exemplo, temos um objeto que possui determinadas
// características e queremos que em todo o sistema seja usado
// esse mesmo objeto quando a classe for instaciada

/* Modo tradicional

$pessoa = new Pessoa();
$pessoa->setNome('Gandalf');

$pessoa2 = new Pessoa();
$pessoa2->setNome('Smeagol');

$pessoa e $pessoa2 são objetos diferentes

*/

class Pessoa{

  private $nome;

  // Criando o construtor como private, impedimos que outras variáveis
  // instanciem essa classe. Ao tentarmos instanciar uma classe com
  // construtor private, será gerado um erro

  private function __construct(){

  }

  // Método que retorna a própria instância
  public static function getInstance(){

    static $instance = null;

    // Se $instance for null, quer dizer que estamos instanciando
    // pela primeira vez essa classe

    if($instance === null){
      $instance = new Pessoa();
    }

    return $instance;

  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getNome(){
    return $this->nome;
  }

}

// $p = new Pessoa(); Ocorre um erro!

// Forma correta de instanciar no padrão singleton

$p = Pessoa::getInstance(); // Acessamos diretamente o método que retorna a instância

$p->setNome('Gandalf');

echo 'Nome: '.$p->getNome().'<br/>';

// Pegando a mesma instância de pessoa

$p2 = Pessoa::getInstance();

echo 'Nome 2: '.$p2->getNome();

?>
