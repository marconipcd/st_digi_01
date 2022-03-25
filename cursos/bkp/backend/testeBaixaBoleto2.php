<?php    
        require('routeros_api.class.php');
           
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $codBoleto = '312853';
        $query = sprintf("SELECT ID, STATUS_2, BLOQUEADO, N_DOC FROM contas_receber WHERE ID = '%s'",$codBoleto);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        //Dados do boleto
        $cod            = $vetor[0]['ID'];
        $status         = $vetor[0]['STATUS_2'];
        $bloqueado      = $vetor[0]['BLOQUEADO'];
        $nDoc           = $vetor[0]['N_DOC']; 
        $codContrato    = split("/", $nDoc)[0];        
        $dataPgto       = date("Y/m/d");
        $valor          = '1,00';

        if($status == 'ABERTO'){
            //Fechar boleto
            $queryFecharBoleto = sprintf("UPDATE contas_receber SET `VALOR_PAGAMENTO` = '%s',`DATA_PAGAMENTO` = '%s',
            `STATUS_2` = 'FECHADO' WHERE `ID` = '%s'", $valor,$dataPgto,$cod); 
            $qryFecharBoleto = mysqli_query($con, $queryFecharBoleto);

            //Desbloquear Contrato
            if($bloqueado == 'S'){
                
                $queryRadReply = sprintf("DELETE FROM radreply WHERE `username` LIKE '%s' AND `value` LIKE '%BLOQUEADO%'",$codContrato);
                $qryRadReply = mysqli_query($con,$queryRadReply);

                //Buscar Contrato
                $queryBuscaContrato = sprintf("SELECT ID, STATUS_2, BASES_ID FROM acesso_cliente WHERE ID = '%s'", $codContrato);
                $qryBuscaContrato = mysqli_query($con,$queryBuscaContrato);
                while($resultBuscaContrato = mysqli_fetch_assoc($qryBuscaContrato)){
                    $dataContrato[] = array_map('utf8_encode', $resultBuscaContrato); 
                }

                if($dataContrato[0]['STATUS_2'] == 'BLOQUEADO'){
                    $queryDesbloquearContrato = sprintf("UPDATE acesso_cliente SET STATUS_2 = 'ATIVO' WHERE `ID` = '%s'", $codContrato);
                    mysqli_query($con, $queryDesbloquearContrato);
                }

                //Buscar Concentrador
                $queryConcentrador = sprintf("SELECT ID, ENDERECO_IP, USUARIO, SENHA FROM bases WHERE ID = '%s'", $dataContrato[0]['BASES_ID']);
                $qryConcentrador = mysqli_query($con,$queryConcentrador);
                while($resultBuscaConcentrador = mysqli_fetch_assoc($qryConcentrador)){
                    $dataConcentrador[] = array_map('utf8_encode', $resultBuscaConcentrador);
                }

                //Dados do concentrador
                $enderecoIp = $dataConcentrador['ENDERECO_IP'];
                $usuario    = $dataConcentrador['USUARIO'];
                $senha      = $dataConcentrador['SENHA'];

                //Desconectar o Cliente
                if($enderecoIp != null && $enderecoIp != '' && $usuario != null && $usuario != '' && $senha != null && $senha != ''){
                    $API = new RouterosAPI();
                    //$API->debug = true;
                    
                    if ($API->connect($enderecoIp, $usuario, $senha)) {
                        $API->write('/ppp/active/print');
                        $clientesLogado = $API->read();

                        foreach($clientesLogado as $num => $cliente_data) {

                            if($cliente_data['name'] == $codContrato){                            
                                $API->write('/ppp/active/remove', false);
                                $API->write("=.id=" . $cliente_data[".id"], true);
                            }                    
                        }
                    }
                }
            }            
        }

?>