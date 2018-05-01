<?php

class Fotos extends model{

	public function getFotos(){
		$array = array();

		$sql = "SELECT * FROM fotos ORDER BY id DESC";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}


		return $array;
	}

	public function saveFotos(){
		//print_r($_FILES);

		if(isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])){

			// Arquivos permitidos
			$permitidos = array('image/jpeg', 'image/jpg', 'image/png');

			if(in_array($_FILES['arquivo']['type'], $permitidos)){
				// Novo nome da foto
				$nome = md5(time().rand(0,999)).'jpg';

						// Endereço temporário usado pelo servidor, Endereço novo
				move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/images/'.$nome);

				// Salvando endereço da foto no banco

				$titulo = '';

				if(isset($_POST['nome']) && !empty($_POST['nome'])){
					$titulo = addslashes($_POST['nome']);
				}



				$sql = "INSERT INTO fotos SET nome = '$titulo', url = '$nome'";
				
				$this->db->query($sql);
			}

		}

	}
}