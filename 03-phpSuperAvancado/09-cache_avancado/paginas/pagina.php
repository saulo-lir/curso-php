<html>

<head>
  <title>Página de Teste</title>
  <meta charset='utf-8'/>
</head>

<body>

  <h1>Página 1</h1>

  <div style='width:300px;margin:auto;background-color:#999;padding:20px'>
    <h1>Este é um cabeçalho <?= rand(0, 9999) ?></h1>

    <form method='POST'>
      <input type='text' placeholder='E-mail' /><br/><br/>

      <input type='password' placeholder='senha' /><br/><br/>

      <input type='submit' value='Entrar' />

    </form>

  </div>

</body>

</html>
