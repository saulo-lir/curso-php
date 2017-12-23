
<div class='container-fluid'>
    <div class='row'>
        <div class='col-sm-5'>

            <!-- Criando slideshow -->
            <div class='carousel slide' data-ride='carousel' id='meuCarousel'>
                <div class='carousel-inner' role='listbox'>
                    <?php foreach($info['fotos'] as $chave => $foto){ ?>
                    <div class="item <?= ($chave == '0')?'active':''; ?>"> <!-- A primeira foto que aparecer vai estar com o status active -->
                        <img src='<?= BASE_URL ?>assets/images/anuncios/<?=$foto['url']?>' />
                    </div>
                    <?php } ?>
                </div>
                <a class='left carousel-control' href='#meuCarousel' role='button' data-slide='prev'><span><</span></a>
                <a class='right carousel-control' href='#meuCarousel' role='button' data-slide='next'><span>></span></a>
            </div>

        </div>
        <div class='col-sm-7'>
            <h1><?= $info['titulo'] ?></h1>
            <h4><?= utf8_encode($info['categoria']) ?></h4>
            <p><?= $info['descricao'] ?></p>
            <br/>
            <h3>R$ <?= number_format($info['valor'],2) ?></h3>
            <h4>Contato: <?= $info['telefone'] ?></h4>
        </div>
    </div>
</div>
