<?php
    header('Content-Type: text/html; charset=ISO-8859-1');

    
    if(isset($_REQUEST['notificationCode'])){
        //echo "teste";
        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        $codNotificacao = $_REQUEST['notificationCode'];
        curl_setopt($curl, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/' . $codNotificacao . '?email=vendas@digitalonline.com.br&token=E7A0753645654BEAB15E38680F949FFE'); 
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        
        $output = curl_exec($curl);
      
        if ($output === FALSE) {
            echo 'erro';
            //$con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
            //if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
            //$query = sprintf("INSERT INTO notificacoes_pagseguro (ID, NOTIFICACAO) VALUES (NULL, '%s')",curl_error($curl) . PHP_EOL);
            //$qryLista = mysqli_query($con,$query );    
            
        }else {
            echo 'ok';
            $xml = simplexml_load_string($output);
            
            $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
            if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
            $query = sprintf("INSERT INTO notificacoes_pagseguro (`ID`,`CODIGO_TRANSACAO`,`REFERENCIA_COD_BOLETO`,`TIPO`,`STATUS`,`DATA_PAGAMENTO`,`DATA_EVENTO`) 
            VALUES (NULL, '%s','%s','%s','%s','%s','%s')",$xml->code,$xml->reference,$xml->type,$xml->status,$xml->date,$xml->lastEventDate);
            $qryLista = mysqli_query($con,$query);    

            //-- BAIXAR O BOLETO---------------------
            //---------------------------------------

            if($xml->status == '3'){
            
                $codBoleto = $xml->reference;
            
                require('routeros_api.class.php');           
                
                $queryBuscarBoleto = sprintf("SELECT ID, STATUS_2, BLOQUEADO, N_DOC FROM contas_receber WHERE ID = '%s'",$codBoleto);
            
                $qryListaBuscarBoleto = mysqli_query($con, $queryBuscarBoleto);    
                while($resultado = mysqli_fetch_assoc($qryListaBuscarBoleto)){
                    $vetor[] = array_map('utf8_encode', $resultado); 
                }    

                //---/-Dados do boleto-/---//
                //----------------------------//
                $cod            = $vetor[0]['ID'];
                $status         = $vetor[0]['STATUS_2'];
                $bloqueado      = $vetor[0]['BLOQUEADO'];
                $nDoc           = $vetor[0]['N_DOC']; 
                $codContrato    = intval(split("/", $nDoc)[0]);        
                $dataPgto       = date("Y/m/d");
                $valorPago      = $xml->grossAmount;
                $valorLiquido   = $xml->netAmount;
                $valorTarifa    = (double)$valorPago-(double)$valorLiquido;
                
                //Tratamento
                $valorTarifa    = str_replace(".",",",$valorTarifa);
                $valorLiquido   = str_replace(".",",",$valorLiquido);
                $valorPago   = str_replace(".",",",$valorPago);

               // if($status == 'ABERTO'){
                    //Fechar boleto
                    $queryFecharBoleto = sprintf("UPDATE contas_receber SET `VALOR_LANCAMENTO` = '%s', `VALOR_PAGAMENTO` = '%s',`DATA_PAGAMENTO` = '%s',
                    `STATUS_2` = 'FECHADO', `FORMA_PGTO` = 'PAGSEGURO',`VALOR_TARIFA` = '%s'  WHERE `ID` = '%s'", $valorLiquido,$valorPago,$dataPgto,$valorTarifa,$cod); 
                    $qryFecharBoleto = mysqli_query($con, $queryFecharBoleto);


                    //Verificar Renovação
                    //------------------------------
                    //----------------------------------------------------
                
                    $regexNova = "^".$codContrato."/[0-9]{2}-[0-9]{2}/[0-9]{2}";
                    $queryBoletosPorContrato = "SELECT * from contas_receber cr where cr.n_doc REGEXP '".$regexNova."' and cr.status_2 ='ABERTO'";
                    $qryBoletosPorContrato = mysqli_query($con, $queryBoletosPorContrato);
                    $rows = mysqli_num_rows($qryBoletosPorContrato);

                    if($rows == 0){

                        //Cadastrar no Log como Pendentes
                        $queryCadasrarLog = sprintf("INSERT INTO agenda_renovacoes (ID,CONTRATO_ID, STATUS, DATA) VALUES (NULL, '%s', '%s', '%s');", 
                        $codContrato,'PENDENTE',date('Y-m-d')); 
                        $qryCadasrarLog = mysqli_query($con, $queryCadasrarLog);

                    }

                    //----------------------------------------
                    
                    $queryLogBaixaBoleto = sprintf("INSERT INTO `db_opus`.`alteracoes_conta_Receber` (
                        `ID` , `DATA_ALTERACAO` ,`TIPO` , `CONTA_RECEBER_ID` ,`EMPRESA_ID` ,`OPERADOR_ID`)
                        VALUES ( NULL , CURRENT_TIMESTAMP(), '%s', '%s', '1', '100')", 
                        "BAIXOU UM BOLETO",$cod); 
                    $qryLogBaixaBoleto = mysqli_query($con, $queryLogBaixaBoleto);
                            
                    $queryRadReply = sprintf("DELETE FROM radreply WHERE `username` = '%s' AND `value` LIKE 'BLOQUEADO'",$codContrato);
                    $qryRadReply = mysqli_query($con,$queryRadReply);

                    //Buscar Contrato
                    $queryBuscaContrato = sprintf("SELECT ID, STATUS_2, BASES_ID FROM acesso_cliente WHERE ID = '%s'", $codContrato);
                    $qryBuscaContrato = mysqli_query($con,$queryBuscaContrato);
                    while($resultBuscaContrato = mysqli_fetch_assoc($qryBuscaContrato)){
                        $dataContrato[] = array_map('utf8_encode', $resultBuscaContrato); 
                    }

                    if($dataContrato[0]['STATUS_2'] == 'BLOQUEADO' && $bloqueado == 'S'){
                        $queryDesbloquearContrato = sprintf("UPDATE acesso_cliente SET STATUS_2 = 'ATIVO' WHERE `ID` = '%s '", $codContrato);
                        mysqli_query($con, $queryDesbloquearContrato);
                    

                        //Buscar Concentrador
                        $queryConcentrador = sprintf("SELECT ID, ENDERECO_IP, USUARIO, SENHA FROM bases WHERE ID = '%s'", $dataContrato[0]['BASES_ID']);
                        $qryConcentrador = mysqli_query($con,$queryConcentrador);
                        while($resultBuscaConcentrador = mysqli_fetch_assoc($qryConcentrador)){
                            $dataConcentrador[] = array_map('utf8_encode', $resultBuscaConcentrador);
                        }

                        //Dados do concentrador
                        $enderecoIp = $dataConcentrador[0]['ENDERECO_IP'];
                        $usuario    = $dataConcentrador[0]['USUARIO'];
                        $senha      = $dataConcentrador[0]['SENHA'];

                        //Desconectar o Cliente
                        if($enderecoIp != null && $enderecoIp != '' && $usuario != null && $usuario != '' && 
                        $senha != null && $senha != ''){
                                
                            $API = new RouterosAPI();
                            //$API->debug = true;
                            
                            if ($API->connect($enderecoIp, $usuario, $senha)) {
                                $API->write('/ppp/active/print');
                                $clientesLogado = $API->read();

                                foreach($clientesLogado as $num => $cliente_data) {
                                    //print_r($cliente_data[".id"]);
                                    if($cliente_data['name'] == $codContrato){
                                        //echo 'sim';
                                        $API->write('/ppp/active/remove', false);
                                        $API->write("=numbers=" . $cliente_data[".id"], true);
                                        $API->read();
                                    }                    
                                }
                            }
                        }

                    }
                           
               // }
            }
        }

    }
?>