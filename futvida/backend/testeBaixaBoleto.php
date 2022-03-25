<?php
    echo 'teste';
    $qryConsultaBoleto = mysqli_query($con,sprintf("SELECT ID, STATUS_2, BLOQUEADO FROM contas_receber WHERE ID = '%s'",$codBoleto));
   
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $codBoleto = '312853';
        $query = sprintf("SELECT ID, STATUS_2, BLOQUEADO FROM contas_receber WHERE ID = '%s'",$codBoleto);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        
        $status   = $vetor[0]['STATUS_2']);
        $cod      = $vetor[0]['ID']);
        $dataPgto = date("Y/m/d");
        $valor    = '1,00';

        if($status == 'ABERTO'){
            //Fechar boleto
            $queryFecharBoleto = sprintf("UPDATE contas_receber SET `VALOR_PAGAMENTO` = '%s',`DATA_PAGAMENTO` = '%s',
            `STATUS_2` = 'FECHADO' WHERE `ID` = '%s'", $valor,$dataPgto,$cod); 
            $qryFecharBoleto = mysqli_query($con, $queryFecharBoleto);

            print_r($qryConsultaBoleto);
            //Desbloquear Contrato
        }

?>