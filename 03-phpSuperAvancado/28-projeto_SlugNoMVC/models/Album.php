<?php

class Album extends model{

  public function getAlbuns(){
    $array = array();

    $sql = $this->db->query("SELECT * FROM albuns");

    if($sql->rowCount() > 0){
      $array = $sql;
    }

    return $array;
  }
}

?>
