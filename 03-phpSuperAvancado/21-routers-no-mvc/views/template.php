
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/style.css'/>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
    <title>Meu Site</title>
  </head>

  <body>

    <h1>Topo</h1>        

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>

  </body>
</html>
