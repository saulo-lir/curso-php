<?php
  // O padrão Adpter é utilizado quando precisamos fazer
  // uma extensão / adaptação de uma classe pois não temos
  // acesso direto a ela ou não podemos editá-la diretamente
  // Ex.: Editar uma classe de algum Framework

  class Pessoa{
    private $nome;
    private $idade;

    public function __construct($nome, $idade){
      $this->nome = $nome;
      $this->idade = $idade;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getIdade(){
      return $this->idade;
    }

  }

  // Criando uma classe adaptadora

  class PessoaAdapter{
    private $sexo;
    private $pessoa;
                      // Recebe no construtor a classe que será feita a adaptação
    public function __construct(Pessoa $pessoa){
      $this->pessoa = $pessoa;
    }

    public function setSexo($s){
      $this->sexo = $s;
    }

    public function getSexo(){
      return $this->sexo;
    }

    public function getNome(){
      return $this->pessoa->getNome();
    }

    public function getIdade(){
      return $this->pessoa->getIdade();
    }

  }

  // Criando o objeto da primeira classe

  $pessoa = new Pessoa('Fulano',100);

  // Criando o objeto da classe adaptadora

  $pa = new PessoaAdapter($pessoa);
  $pa->setSexo('Masculino');

  echo 'Nome: '.$pa->getNome().'<br/>';
  echo 'Idade: '.$pa->getIdade().'<br/>';
  echo 'Sexo: '.$pa->getSexo().'<br/>';

?>
