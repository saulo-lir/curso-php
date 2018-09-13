
<div class='home_sobre'>
	<img src='' border='0' width='150' height='150' />

	<h4>Sobre</h4>
	<p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </p>

</div>

<div class='home_portfolio'>
	<h4>Meu Portfolio Recente</h4>

	<?php foreach($portfolio as $item) { ?>

		<div class='portfolio_item'>
			<img src='<?=BASE_URL?>/assets/portfolio/<?=$item['imagem']?>' border='0' width='200' height='150'/>
		</div>

	<?php } ?>

	<div style='clear:both'></div>
</div>



