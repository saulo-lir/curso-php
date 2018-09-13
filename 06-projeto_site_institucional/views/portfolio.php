 <h1>Meu Portfolio Recente</h1>

<?php foreach($portfolio as $item) { ?>

	<div class='portfolio_item'>
		<img src='<?=BASE_URL?>/assets/portfolio/<?=$item['imagem']?>' border='0' width='200' height='150'/>
	</div>

<?php } ?>

<div style='clear:both'></div>