<html>
  <head>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/bootstrap.min.css'/>
    <link rel='stylesheet' type='text/css' href='<?= BASE_URL ?>assets/css/exemplo.css'/>
    <title><?= $this->config['titulo_site'] ?></title>
  </head>

  <body>  

    <div class='menu'>
      
    </div>	

  	<div class='topo'>
  		
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
