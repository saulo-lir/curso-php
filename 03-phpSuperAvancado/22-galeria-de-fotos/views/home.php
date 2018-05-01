<fieldset>
	<legend>Adicionar uma Foto</legend>

	<form method='POST' enctype='multipart/form-data'>
		Foto:<br/>

		<input type='text' name='nome' /><br/><br/>

		<input type='file' name='arquivo' /><br/><br/>

		<input type='submit' value='Enviar Arquivo'/>
	</form>
	
</fieldset>

<br/><br/>
	

<?php foreach($fotos as $foto){ ?>

<img src="<?= BASE_URL ?>assets/images/<?=$foto['url']?>" border='0' width='300' /><br/>
<?= $foto['nome']; ?>

<hr/>


<?php } ?>


