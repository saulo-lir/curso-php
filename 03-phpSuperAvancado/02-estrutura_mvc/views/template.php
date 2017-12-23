<!--
  Esse arquivo contem a estrutura visual do site, com a parte
  front-end e modelos que serão repetidos em várias páinas
-->
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/style.css'/>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
    <title>Meu Site</title>
  </head>

  <body>

    <h1>Este é o topo</h1>
    <!--
      BASE_URL foi definida no config.php como:
      http://localhost/curso-php/03-phpSuperAvancado/02-estrutura_mvc/
    -->
    <a href='<?= BASE_URL ?>'>Home</a>
    <a href='<?= BASE_URL ?>galeria'>Galeria</a>

    <hr/>

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>

  </body>
</html>
