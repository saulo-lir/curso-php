
<ul class="menu">
	<?php foreach($menu as $menuitem){ ?>

	<a href="<?=BASE_URL.$menuitem['url']?>">	
		<li><?= $menuitem['nome'] ?></li>
	</a>

	<?php } ?>	
</ul>