<?php
    require 'conexao.php';
    require 'classes/reservas.class.php';
    require 'classes/carros.class.php';
    
    $reservas = new Reservas($pdo);
       
?>

<h1>Reservas</h1>

<a href='reservar.php'>Adicionar Reserva</a>
<br/><br/>

<form>
    <select name='ano'>
        <?php for($i=date('Y');$i >= 2000;$i--){ ?>
            <option><?= $i ;?></option>
        <?php } ?>
    </select>
    
    <select name='mes'>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
    </select>
    
    <input type='submit' value='Mostrar' />
</form>

<?php

if(empty($_GET['ano'])){ // Se o formulário não foi enviado, encerra o script
   exit;
}

/* Construindo um calendário */

$data = $_GET['ano'].'-'.$_GET['mes']; // Ano e Mês informados no formulário

// 1) Saber qual o primeiro dia da semana (dom,seg,ter,qua,qui,sex,sab) da data informada

$dia1 = date('w', strtotime($data)); // w: retorna de 0 a 6 (Domingo a Sábado)

// $dia1 = date('w', strtotime($data.'-02')); Irá retornar qual o dia da semana do dia 2 de Janeiro de 2017

// 2) Saber quantas linhas o calendário irá ter (Pode ter 5 ou 6 linhas)

$dias = date('t', strtotime($data)); // t: Retorna o número de dias que um mês específico tem
$linhas = ceil(($dia1 + $dias) / 7); // ceil: Arredonda o valor para cima

// 3) Saber qual o primeiro dia (1 a 31) do calendário do mês informado

$dia1 = -$dia1; // Transforma em negativo
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));

// 4) Saber o último dia (1 a 31) do calendário do mês informado

                                        //$linhas * 7 = Quantidade de dia que existe no calendário
$data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas * 7) - 1)).' days', strtotime($data)));

/* Construindo um calendário */

/*

echo 'Primeiro dia do mês: '.$dia1.'<br/>';
echo 'Total de dias desse mês: '.$dias.'<br/>';
echo 'Total de linhas do calendário: '.$linhas.'<br/>';
echo 'Data inicial do calendário: '.$data_inicio.'<br/>';
echo 'Data final do calendário: '.$data_fim.'<br/>';
echo '<br/><br/>';

*/


$listaReservas = $reservas->listaReservas($data_inicio, $data_fim);

/*
foreach($listaReservas as $item){
    $data1 = date('d/m/Y', strtotime($item['data_inicio']));
    $data2 = date('d/m/Y', strtotime($item['data_fim']));
    
    echo $item['pessoa'].' reservou o carro '.$item['id_carro'].' entre '.
    $data1.' e '.$data2.'<br/><br/>';
}
*/

?>

<hr/>

<?php
    require 'calendario.php';
?>








