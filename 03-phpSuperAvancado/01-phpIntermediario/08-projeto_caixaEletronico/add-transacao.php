<?php
session_start();
require 'conexao.php';

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    $valor = str_replace(',','.',$_POST['valor']); // Onde tiver ponto no número, será trocado por vírgula, uma vez que o padrão americano usa o ponto nas casa decimais
    $valor = floatval($valor); // Converte a variável em float, garantindo que seja do mesmo tipo do valor no banco de dados
    
    
    $sql = $pdo->prepare("INSERT INTO historico (id_conta,tipo,valor,data_operacao) VALUES (:id_conta,:tipo,:valor,NOW())");
    $sql->bindValue(':id_conta',$_SESSION['banco']);
    $sql->bindValue(':tipo',$tipo);
    $sql->bindValue(':valor',$valor);
    $sql->execute();
    
    if($tipo == 0){
        //Depósito
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id");
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':id',$_SESSION['banco']);
        $sql->execute();
    }else{
        //Saque
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id");
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':id',$_SESSION['banco']);
        $sql->execute();
    }
    
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html> <!-- Necessário para poder usar alguns elementos do html, como o parâmetro 'pattern' por exemplo -->
<html>
    <head>
        <title>Adicionar Transação</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <form method='POST'>
            Tipo de Transação:<br/>
            <select name='tipo'>
                <option value='0'>Depósito</option>
                <option value='1'>Saque</option>
            </select><br/><br/>
            
            Valor:<br/>
            <input type='text' name='valor' pattern='[0-9.,]{1,}'><br/><br/> <!-- Expressão regular, indicando que o campo irá aceitar números com vírgulas e pontos -->
            
            <input type='submit' value='Adcionar'>
        </form>
    </body>
    
    
</html>
