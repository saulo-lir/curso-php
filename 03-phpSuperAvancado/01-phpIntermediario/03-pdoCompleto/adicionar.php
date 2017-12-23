
<?php

require 'conexao.php';

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']); // addslashes() = Função que adiciona barras invertidas na string caso ela possua aspas simples ou duplas , para evitar o sql injection
        $idade = addslashes($_POST['idade']);
        $senha = md5(addslashes($_POST['senha'])); // Adicionou as barras invertidas e ainda criptografou
        
        $sql = "INSERT INTO pessoa (nome, idade, senha) values ('$nome','$idade','$senha')";
        $pdo->query($sql);
        
        header('Location: index.php'); // Redireciona para página index.php
    }

?>

<html>
    <head>
        <title>Adicionar Usuário</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <form method='POST'> <!-- vai enviar pra mesma página (adicionar.php) -->
            NOME:<input type='text' name='nome'><br/>
            IDADE:<input type='text' name='idade'><br/>
            SENHA:<input type='password' name='senha'><br/>
            <input type='submit' value='ADICIONAR'><br/>
        </form>     
        
    </body>
</html>
