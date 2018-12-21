<?php

if(!empty($_FILES['foto']['tmp_name'])){

	// Filtrar pelo tipo de arquivo
	if($_FILES['foto']['type'] == 'image/png'){

		// Atribuir um nome aleatório para o arquivo com a extensão que é aceita
		$nome = md5(rand(0, 9999).time()).'.png';

		move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome);
	}

}