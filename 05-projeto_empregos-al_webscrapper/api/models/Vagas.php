<?php
require './libs/simple_html_dom.php';


class Vagas extends model{

	public function listarVagas(){
		$response = [];

		$html = file_get_html('http://www.advancerh.com.br/vagas-de-emprego.php');
		$results = $html->find('section[align=left]');
		
		$response['total'] = count($results);


		foreach($results as $key => $vaga){

			if($vaga->find('span', 0)){
				$response[$key]['titulo'] = $vaga->find('span', 0)->plaintext;
			}

			if($vaga->find('p', 1)){
				$response[$key]['subtitulo'] = $vaga->find('p', 1)->plaintext;
			}
			
			if($vaga->find('p', 2)){
				$response[$key]['requisitos'] = $vaga->find('p', 2)->plaintext;
			}
			
			if($vaga->find('p', 3)){
				$response[$key]['subtitulo2'] = $vaga->find('p', 3)->plaintext;
			}
			
			if($vaga->find('p', 4)){
				$response[$key]['atividades'] = $vaga->find('p', 4)->plaintext;
			}

			if($vaga->find('p', 5)){
				$response[$key]['contato'] = $vaga->find('p', 5)->plaintext;
			}							
			
		}

		return $response;
	}

	public function addVaga($titulo){
		//$this->db->query("INSERT INTO tarefas SET titulo = '$titulo'");
	}
	

}