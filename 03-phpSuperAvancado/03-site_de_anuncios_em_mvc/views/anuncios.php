<?php
// Bloquear usuários não autorizados a acessar essa página

if(empty($_SESSION['cLogin'])){

?>
    <script type='text/javascript'>window.location.href='<?= BASE_URL ?>login';</script>

<?php
    exit;

    }
?>

<div class='container'>
    <h1>Meus Anúncios</h1>

    <a href='<?= BASE_URL ?>anuncios/adicionar' class='btn btn-default'>Adicionar Anúncio</a>

    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
            $a = new Anuncios();
            $anuncios = $a->getMeusAnuncios($_SESSION['cLogin']);

            foreach($anuncios as $anuncio){
        ?>
        <tbody>
            <tr>
                <td>
                    <?php if(!empty($anuncio['url'])){ ?>
                        <img src='<?= BASE_URL ?>assets/images/anuncios/<?=$anuncio['url']?>' height='50' border='0' />
                    <?php }else{ ?>
                        <img src='<?= BASE_URL ?>assets/images/default.png' height='50' border='0' />
                    <? } ?>
                </td>
                <td><?= $anuncio['titulo']; ?></td>
                <td>R$ <?= number_format($anuncio['valor'],2); ?></td>
                <td>
                    <a href='<?= BASE_URL ?>anuncios/editar?id=<?=$anuncio['id']?>' class='btn btn-primary'>Editar</a>
                    <a href='<?= BASE_URL ?>anuncios/excluir?id=<?=$anuncio['id']?>' class='btn btn-danger'>Excluir</a>
                </td>
            </tr>
        </tbody>

        <?php
            }
        ?>

    </table>

</div>
