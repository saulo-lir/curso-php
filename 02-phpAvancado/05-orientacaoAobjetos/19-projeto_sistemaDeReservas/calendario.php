

<table border='1' width='100%'>
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
    </tr>
    <?php for($l = 0; $l < $linhas; $l++) { ?>
        <tr>
            <?php for($c = 0; $c < 7; $c++){ ?>
            <?php
                $t = strtotime(($c + ($l * 7)).' days', strtotime($data_inicio));
                $w = date('Y-m-d', $t);
            ?>
                <td>
                <?php
                    echo date('d/m', $t).'<br/><br/>';
                    
                    $w = strtotime($w);
                    
                    foreach($listaReservas as $reserva){
                        $dr_inicio = strtotime($reserva['data_inicio']);
                        $dr_fim = strtotime($reserva['data_fim']);
                        
                        if($w >= $dr_inicio && $w <= $dr_fim){
                            echo $reserva['pessoa'].' ('.$reserva['id_carro'].')<br/>';
                        }   
                    }
                ?>
                </td>
                
            <?php } ?>
        </tr>        
        
    <?php } ?>
</table>








