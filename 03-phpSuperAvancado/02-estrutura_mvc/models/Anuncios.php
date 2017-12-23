<?php

class Anuncios extends model{

  public function getQuantidade(){
    $sql = "SELECT COUNT(*) as quant FROM anuncios";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0){
      $sql = $sql->fetch();
      return $sql['quant'];

    }else{
      return 0;
    }
  }

}
