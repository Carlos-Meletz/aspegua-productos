<?php
function aprox($num){
    $entero = (int)($num / 5);
    $decimal = $num - ($num % 10);
    if($decimal > 0){
        return ($entero * 5) + 5; 
    }else{
        return ($entero * 5);
    }
}
$precio = $_POST['precio'];
$periodo = $_POST['plazo'];
$tasa = 43 / 100 / 12;

$credito = $precio * (1 + ( 5.264 / 100 ));

$cuota = $credito * ($tasa  / (1 - pow(1 + $tasa, $periodo * -1)));
        ?>
            <!-- <label>Cuota Exacta: Q <?php //echo number_format($cuota,2); ?></label> -->
            <!-- <br> -->
            <div class="cuota">
                <label>Cuota:<b> Q <?php echo number_format(aprox($cuota),2); ?></b></label>
            </div>
            <br>
            <table id="lista">
                <caption>Plan de Pagos</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Cuota</th>
                        <th>Capital</th>
                        <th>Interes</th>
                        <th>Amortizacion</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cap = []; $inte = []; $amr = []; $saldo = []; $total=0;
                    for($i = 0; $i <= $periodo; $i++){ 
                        $anual = $cuota;
                        if($i == 0){
                            $anual = 0;
                            $saldo[$i] = $credito;
                            $amr[$i] = 0;
                            $inte[$i] = 0;
                            $cap[$i] = 0;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo 'Q. '.number_format($anual,2) ;?></td>
                                <td><?php echo 'Q. '.number_format($cap[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($inte[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($amr[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($saldo[$i],2) ;?></td>
                            </tr>
                            <?php
                        }else{
                            $inte[$i] = $saldo[$i - 1] * $tasa;
                            $cap[$i] = $anual - $inte[$i];
                            $amr[$i] = $amr[$i - 1] + $cap[$i];
                            $saldo[$i] = $saldo[$i - 1] - $cap[$i];
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo 'Q. '.number_format($anual,2) ;?></td>
                                <td><?php echo 'Q. '.number_format($cap[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($inte[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($amr[$i],2) ;?></td>
                                <td><?php echo 'Q. '.number_format($saldo[$i],2) ;?></td>
                            </tr>
                            <?php
                        }
                        $total = $total + $anual;
                    } ?>
                </tbody>
            </table>
            <br>
            <div class="total" id="total">
                <label> Total a pagar = Q. <?php echo number_format($total,2);?></label>
            </div>