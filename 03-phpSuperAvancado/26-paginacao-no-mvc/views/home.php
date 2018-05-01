
<table border='0' width='500'>

<?php foreach($lista as $item){ ?>

	<tr>
		<td><?= $item['id'] ?></td>
		<td><?= $item['titulo'] ?></td>
	</tr>

<?php } ?>

</table>

<br/>

<!-- Exibir total de páginas --> 

<?php for($i = 1; $i <= $paginas; $i++){ ?>

	<?php if($paginaAtual == $i){ ?>

		<a href='<?= BASE_URL ?>?p=<?=$i?>'><strong><?= $i ?></strong></a>

	<?php } else{ ?>

		<a href='<?= BASE_URL ?>?p=<?=$i?>'><?= $i ?></a>

	<?php } ?>
	

<?php } ?>