<?php

function calcularCadastros($id, $limite){
  global $pdo;
  $lista = array();

  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_pai = :id");
  $sql->bindValue(':id', $id);
  $sql->execute();

  $filhos = 0;

  if($sql->rowCount() > 0){
    $lista = $sql->fetchAll();

    $filhos = $sql->rowCount();

    foreach($lista as $chave => $usuario){
      if($limite > 0){
        $filhos += calcularCadastros($usuario['id'], $limite - 1);

      }
    }
  }

  return $filhos;
}


function listar($id, $limite){
  global $pdo;
  $lista = array();

  $sql = $pdo->prepare("SELECT usuarios.id, usuarios.id_pai, usuarios.patente, usuarios.nome, patente.nome as p_nome
    FROM usuarios
    LEFT JOIN patente ON patente.id = usuarios.patente
    WHERE usuarios.id_pai = :id");

  $sql->bindValue(':id', $id);
  $sql->execute();

  if($sql->rowCount() > 0){
    $lista = $sql->fetchAll();

    foreach($lista as $chave => $usuario){
      $lista[$chave]['filhos'] = array();

      if($limite > 0){
        $lista[$chave]['filhos'] = listar($usuario['id'], $limite - 1);
      }
    }
  }

  return $lista;
}


function exibir($array){
  echo '<ul>';
  foreach($array as $usuario){
    echo '<li>';
    echo $usuario['nome'].' ('.$usuario['p_nome'].')';

    if(count($usuario['filhos']) > 0){
      exibir($usuario['filhos']);
    }

    echo '</li>';
  }
  echo '</ul>';
}
