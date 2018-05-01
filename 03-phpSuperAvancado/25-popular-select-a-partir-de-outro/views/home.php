<form method='POST'>
	Escolha o módulo:<br/>

	<select name='modulos' id='modulos' onchange='pegarAulas(this);'>
		
			<option value=''>Escolha:</option>

		<?php foreach($modulos as $modulo){ ?>	

			<option value='<?= $modulo['id'] ?>'><?= $modulo['titulo'] ?></option>

		<?php } ?>

	</select><br/><br/>

	Escolha a aula:<br/>
	<select name='aulas' id='aulas'>
		
	</select><br/><br/>

	<input type='submit' value='Enviar'/>

</form>