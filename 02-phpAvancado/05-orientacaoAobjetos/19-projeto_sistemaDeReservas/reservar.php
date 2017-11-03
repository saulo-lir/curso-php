<?php
    require 'conexao.php';
    require 'classes/reservas.class.php';
    require 'classes/carros.class.php';
    
    $reservas = new Reservas($pdo);
    $carros = new Carros($pdo);
    
    
    if(isset($_POST['carro']) && !empty($_POST['carro'])){
        $carro = addslashes($_POST['carro']);
        // As datas precisam ser salvas no banco no formato americano
        $data_inicio = explode('/', addslashes($_POST['data_inicio']));
        $data_fim = explode('/', addslashes($_POST['data_fim']));
        $pessoa = addslashes($_POST['pessoa']);
        
        // Reordenando a data no formato americano
        
                            // Ano           // Mês             // Dia
        $data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
        
                            // Ano           // Mês             // Dia
        $data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];
        
       if($reservas->verificarDisponibilidade($carro,$data_inicio,$data_fim)){
            
            $reservas->reservar($carro,$data_inicio,$data_fim, $pessoa);
            header('Location: index.php');
            exit;
       }else{
            echo 'Este carro já está reservado para este período';
       }
            
    }
       
?>

<h1>Adicionar Reserva</h1>

<form method='POST'>
    
    <select name='carro'>
        
    <?php
        $listaCarros = $carros->listaCarros();
        
        foreach($listaCarros as $carro){
    ?>    
        <option value='<?=$carro['id'];?>'><?=$carro['nome'];?></option>
     
    <?php
        }
    ?>
    
    </select><br/><br>

    Data de Início:<br/>
    <input type='text' name='data_inicio' /><br/><br/>
    
    Data de Fim:<br/>
    <input type='text' name='data_fim' /><br/><br/>
    
    Nome da Pessoa:<br>
    <input type='text' name='pessoa' /><br/><br/>
    
    <input type='submit' value='Reservar' />
    
</form>