
<html>
  <head>
    <title>Sistema</title>
    <link rel='stylesheet' href='<?= BASE_URL ?>assets/css/template.css' >    
  </head>

  <body>    

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>

    <script type='javascript' src='<?= BASE_URL ?>assets/js/jquery-3.3.1.min.js'></script>
    <script type='javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
  </body>
</html>
