<?php
require 'banco.php';

$banco = new Banco('localhost','teste','root',''); // Cria conexão

$banco->query("SELECT * FROM pessoa"); // Faz a query

$qtPessoas = $banco->numRows(); // Executa o método de contagem de linhas

echo 'Quantidade de pessoas: '.$qtPessoas;
//echo 'Quantidade de pessoas: '.$banco->numRows();


echo '<br/><br/>';

$i = 1;

if($banco->numRows() > 0){
    foreach($banco->result() as $pessoa){ // Armazena os resultados da consulta no array $pessoa e exibe
        echo 'Pessoa '.$i.':<br/><br/>';
        echo 'Nome: '.$pessoa['nome'].'<br/>';
        echo 'Idade: '.$pessoa['idade'].'<br/>';
        echo '<hr/>';
        
        $i++;
    }
}else{
    echo 'Não houve resultados :(';
}


// INSERIR
 
$banco->insert('pessoa',array(
         'nome' => 'Gandalf',
         'idade' => 1000,
         'senha' => md5('123')
    ));


echo 'Dados inseridos com sucesso!';


// ATUALIZAR

$banco->update('pessoa', array('nome' => 'Nome Atualizado', 'idade' => 40, 'senha' => '123'), array('id' => '1'));
               
echo 'Dados atualizados com sucesso!';


$banco->delete('pessoa', array('id'=>'2'));

echo 'Dados deletados com sucesso!';
?>
