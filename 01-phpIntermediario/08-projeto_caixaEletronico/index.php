<?php

session_start();
require 'conexao.php';


if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){
    $id = $_SESSION['banco'];
    
    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        $titular = $sql->fetch();
    }else{
        header('Location: login.php');
        exit;
    }
    
}else{
    header('Location: login.php');
    exit;
}

?>

<html>
    <head>
        <title>Caixa Eletrônico</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Banco do Maroto</h1>
        Titular: <?=$titular['titular']?><br/>
        Agência: <?=$titular['agencia']?><br/>
        Conta: <?=$titular['conta']?><br/>
        Saldo: <?=$titular['saldo']?><br/>
        <a href='sair.php'>Sair</a>
        
        <hr/>
        
        <h3>Movimentação / Extrato</h3>
        
        <a href='add-transacao.php'>Adcionar Transação </a><br/><br/>
        
        <table border='1' width='400'>
            <tr>
                <th>Data</th>
                <th>Valor</th>
            </tr>
<?php
    $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
    $sql->bindValue(':id_conta',$id);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $dado){
?>
            <tr>
                <td><?=date('d/m/Y H:i',strtotime($dado['data_operacao']))?></td>
                <td>
                    <?php if($dado['tipo'] == 0): // Se foi um depósito, muda a cor para verde ?>
                    <font color='green'>R$ <?=$dado['valor']?></font>
                    <?php else: // Senão, muda para cor vermelha, idicando saque ?>
                    <font color='red'>- R$ <?=$dado['valor']?></font>
                    <?php endif; ?>
                </td>
            </tr>

<?php
        }
    }

?>                              
        </table>
           
    </body>  
</html>
