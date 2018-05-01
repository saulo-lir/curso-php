<?php 

class Itens extends model{

	public function getLista($offset, $limite){
		$array = array();

									// Intervalo de filtro
		$sql = "SELECT * FROM itens LIMIT $offset, $limite";
		$sql = $this->db->query($sql);

		$array = $sql->fetchAll();

		return $array;
	}

	public function getTotal(){
		$sql = "SELECT COUNT(*) as c FROM itens";
		$sql = $this->db->query($sql);
		$sql = $sql->fetch();

		return $sql['c'];
	}

}