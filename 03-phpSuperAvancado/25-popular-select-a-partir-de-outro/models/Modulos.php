<?php 


class Modulos extends model{

	public function getLista(){
		$array = array();

		$sql = "SELECT * FROM modulos";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

	}

}