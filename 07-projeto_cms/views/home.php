
<div class='home_banner' style="background-image:url('<?= BASE_URL ?>assets/img/<?= $this->config['home_banner'] ?>')">
	
</div>

<div class='home_banner_txt'>
	<?= $this->config['home_welcome'] ?>
</div>

<div class='home_depo'>

	<h3>Depoimentos</h3>

	<?php  foreach($depoimentos as $item){ ?>

		<strong><?= $item['nome']; ?></strong><br/>
		<strong><?= $item['texto']; ?></strong>

		<hr/>


	<?php }	?>

</div>

<div class='home_cta'>
	Deseja conferir nossos serviços?<br/>

	<a href='<?= BASE_URL ?>servicos' class='btn btn-lg btn-info'>
		
		Conferir Serviços
		
	</a>
</div>

