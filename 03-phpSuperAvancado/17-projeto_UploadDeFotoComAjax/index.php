<html>

<head>
  <title>Projeto Upload de foto com ajax</title>
</head>

<body>

  <form id='form' method='POST' action='recebedor.php' enctype='multipart/form-data'>
    Nome:<br/>
    <input type='text' name='nome'><br/><br/>
    Foto:<br/>
    <input type='file' name='foto'/> <br/><br/>

    <input type='submit' value='Enviar' />
  </form>

  <!--
    Nome:<br/>
    <input type='text' name='nome' id='nome'><br/><br/>
    Foto:<br/>
    <input type='file' name='foto' id='foto'/> <br/><br/>

     <button>type='submit' value='Enviar'</button>
  -->
<script type='text/javascript' src='jquery-3.2.1.min.js'/></script>
<script type='text/javascript' src='script.js'/></script>
</body>

</html>
