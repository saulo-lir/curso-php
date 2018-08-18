<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/bootstrap.min.css'/>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/style.css'/>
    <title>Site Institucional</title>
  </head>

  <body>

    <div class='topo'>
      <div class='topo1'></div>

      <div class='banner'>                  

      </div>

    </div>

    <div class='menu'>
      <ul>
        <a href='<?=BASE_URL?>'><li>HOME</li></a>
        <a href='<?=BASE_URL?>portfolio'><li>PORTFÓLIO</li></a>
        <a href='<?=BASE_URL?>sobre'><li>SOBRE</li></a>
        <a href='<?=BASE_URL?>servicos'><li>SERVIÇOS</li></a>
        <a href='<?=BASE_URL?>contato'><li>CONTATO</li></a>
      </ul>
    </div>

    <div class='container'>
        <?php  $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>

    <div class='rodape'>
      
    </div>
   
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/jquery-3.2.1.min.js'></script>
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/bootstrap.min.js'></script>    
    <script type='text/javascript' src='<?= BASE_URL ?>assets/js/script.js'></script>
  </body>
</html>
