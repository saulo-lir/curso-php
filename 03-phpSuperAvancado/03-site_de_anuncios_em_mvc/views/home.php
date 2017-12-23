
<div class='container-fluid'>
    <div class='jumbotron'>
        <h2>Nós temos hoje <?=$totalAnuncios?> anúncios cadastrados no sistema</h2>
        <p>E mais <?=$totalUsuarios?> usuários cadastrados</p>
    </div>

    <div class='row'>
        <div class='col-sm-3'>
            <h4>Pesquisa Avançada</h4>

            <form>
                <div class='form-group'>
                    <label for='categoria'>Categoria</label>
                    <select name='filtros[categoria]' class='form-control' id='categoria'> <!-- Transforma a variável filtros nun array com o índice categoria -->
                            <option></option>
                        <?php foreach($categorias as $categoria){ ?>

                            <option value='<?=$categoria['id']?>' <?= ($categoria['id'] == $filtros['categoria'])?"selected=='selected'":''; ?>><?=utf8_encode($categoria['nome'])?></option>

                        <?php } ?>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='preco'>Preço</label>
                    <select name='filtros[preco]' class='form-control' id='preco'> <!-- Transforma a variável filtros nun array com o índice categoria -->
                        <option></option>
                        <option value='0-50' <?= ($filtros['preco'] == '0-50')?"selected=='selected'":''; ?>>R$ 0,00 - 50,00</option>
                        <option value='51-100' <?= ($filtros['preco'] == '51-100')?"selected=='selected'":''; ?>>R$ 51,00 - 100,00</option>
                        <option value='101-200' <?= ($filtros['preco'] == '101-200')?"selected=='selected'":''; ?>>R$ 101,00 - 200,00</option>
                        <option value='201-500' <?= ($filtros['preco'] == '201-500')?"selected=='selected'":''; ?>>R$ 201,00 - 500,00</option>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='estado'>Estado de Conservação</label>
                    <select name='filtros[estado]' class='form-control' id='estado'> <!-- Transforma a variável filtros nun array com o índice categoria -->
                        <option></option>
                        <option value='0' <?= ($filtros['estado'] == '0')?"selected=='selected'":''; ?>>Ruim</option>
                        <option value='1' <?= ($filtros['estado'] == '1')?"selected=='selected'":''; ?>>Bom</option>
                        <option value='2' <?= ($filtros['estado'] == '2')?"selected=='selected'":''; ?>>Ótimo</option>
                    </select>
                </div>

                <div class='form-group'>
                    <input type='submit' class='btn btn-info' value='Buscar' />
                </div>

            </form>


        </div>
        <div class='col-sm-9'>
            <h4>Últimos Anúncios</h4>

            <table class='table table-striped'>
                <tbody>
                    <?php foreach($anuncios as $anuncio) {?>

                    <tr>
                        <td>
                            <?php if(!empty($anuncio['url'])){ ?>
                            <img src='<?= BASE_URL ?>assets/images/anuncios/<?=$anuncio['url']?>' height='50' border='0' />
                            <?php }else{ ?>
                            <img src='<?= BASE_URL ?>assets/images/default.png' height='50' border='0' />
                            <? } ?>
                        </td>
                        <td>
                            <a href='<?= BASE_URL; ?>produto/abrir/<?=$anuncio['id']?>'><?=$anuncio['titulo']?></a><br/>
                            <?=utf8_encode($anuncio['categoria'])?>
                        </td>
                        <td>
                            R$ <?= number_format($anuncio['valor'],2); ?>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>

            <ul class='pagination'>
                <?php for($i=1;$i<=$totalPaginas;$i++){ ?>
                       <li class="<?= ($paginaAtual == $i)?'active':''; ?>"><a href='<?= BASE_URL; ?>?<?php
                        $w = $_GET;// Armazena todos os dados do $_GET no $w
                        $w['p'] = $i; // Armazena o número da página no índice p
                        echo http_build_query($w); // Transforma o conteúdo da variável $w numa url padrão do navegador
                       ?>'><?=$i?></a></li>
                <?php } ?>
            </ul>

        </div>
    </div>

</div>
