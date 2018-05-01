<?php

class Album extends model{

  public function getAlbuns(){
    $array = array();

    $sql = $this->db->query("SELECT * FROM albuns");        

    if($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }

   // print_r($array); exit;

    return $array;
  }

  public function getAlbum($slug){
  	$array = array();

  	$sql = $this->db->prepare("SELECT * FROM albuns WHERE slug = :slug");
  	$sql->bindValue(':slug', $slug);
  	$sql->execute();

  	if($sql->rowCount() > 0){

  		$array = $sql->fetch();

  	}

  	return $array;
  }
}

?>
