
<html>
  <head>
    <title>Sistema</title>
  </head>

  <body>    

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>

  <script type="text/javascript">var BASE_URL = '<?= BASE_URL; ?>';</script>  
  <script type='text/javascript' src='<?= BASE_URL ?>assets/js/jquery-3.3.1.min.js'></script>
  <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
  </body>
</html>
