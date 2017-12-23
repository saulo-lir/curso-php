<?php
// Essa classe representa o controlador da página inicial

class homeController extends controller{

  // Todo controller tem o método inicial index()
  public function index(){
    // O auto_load no arquivo index.php vai se encarregar de procurar as classes models
    $anuncios = new Anuncios();
    $usuario = new Usuarios();

    // Aqui serão armazenados todos os dados dinâmicos
    // que serão enviados para a página inicial views/home.php
    $dados = array(
      'quantidade' => $anuncios->getQuantidade(),
      'nome' => $usuario->getNome(),
      'idade' => $usuario->getIdade()
    );

    // Método herdado da classe controller que irá carregar o template da página juntos com seus dados
    $this->loadTemplate('home', $dados);
  }



}
