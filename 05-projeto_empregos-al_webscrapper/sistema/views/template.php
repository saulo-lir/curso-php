<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/bootstrap.min.css'/>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/style.css'/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Empregos AL</title>
  </head>

  <body>

    <h3 class='text-center'><strong id='total-vagas'></strong> Vagas Disponíveis <i class="far fa-check-circle"></i></h3>    

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/jquery-3.2.1.min.js'></script>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/jquery.searchable-1.0.0.min.js'></script>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
  </body>
</html>
