
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/style.css'/>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
    <title>Meu Site</title>
  </head>

  <body>

    <h1>Este é o topo</h1>
    
    <a href='<?= BASE_URL ?>'>Home</a>
    <a href='<?= BASE_URL ?>galeria'>Galeria</a>

    <hr/>

    <?php
      $this->loadViewInTemplate($viewName, $viewData);
    ?>

  </body>
</html>
