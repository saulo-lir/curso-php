<?php 

class Depoimentos extends model{

	public function getDepoimentos($limit = 0){

		$array = array();

		$sql = "SELECT * FROM depoimentos ORDER BY RAND()";

		if($limit > 0){
			$sql .= " LIMIT ".$limit;
		}

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			
			$array = $sql->fetchAll();
			
		}

		return $array;

	}

}