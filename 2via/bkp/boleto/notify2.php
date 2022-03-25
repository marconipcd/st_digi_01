<?php
require __DIR__ . '/../api/vendor/autoload.php';
 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = 'Client_Id_54f90d0f28cdd7c03a23458298932bd8cc462112'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_cadbbcad01cdc8833a0db11ab369884251f38c8c'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => false // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
/*
* Este token será recebido em sua variável que representa os parâmetros do POST
* Ex.: $_POST['notification']
*/
$token = $_REQUEST["notification"];

//print_r($token);
 
$params = [
  'token' => $token
];
 
try {
    $api = new Gerencianet($options);
    $chargeNotification = $api->getNotification($params, []);
    //Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.
    
    
    //Veja abaixo como acessar o ID e a String referente ao último status da transação.
    
    // Conta o tamanho do array data (que armazena o resultado)
    $i = count($chargeNotification["data"]);
    // Pega o último Object chargeStatus
    $ultimoStatus = $chargeNotification["data"][$i-1];
    // Acessando o array Status
    $status = $ultimoStatus["status"];
    // Obtendo o ID da transação    
    $charge_id = $ultimoStatus["identifiers"]["charge_id"];
    // Obtendo a String do status atual
    $codBoleto = $chargeNotification["data"][0]['custom_id'];
    
    $statusAtual = $status["current"];
    
   

    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    $query = sprintf("INSERT INTO notificacoes_gerencianet (`ID`,`COD_TRANSACAO`,`COD_BOLETO`,`STATUS`,`DATA`) 
    VALUES (NULL, '%s','%s','%s',NULL)",$charge_id,$codBoleto,$statusAtual);
    $qryLista = mysqli_query($con,$query);
    
    if($statusAtual == 'paid'){
              print_r($chargeNotification["data"]);
              $value = $chargeNotification["data"][count($chargeNotification["data"])-1]['value'];

              if($value == ''){
                $value = $chargeNotification["data"][2]['value'];
              }
                //$value = '1050';
                
                $value = substr($value,0, strlen($value)-2 ).','.substr($value,-2);
                
                //echo "Valor".$value;

                $valorPago = $value;

                $queryBuscarBoleto = sprintf("SELECT ID, STATUS_2, BLOQUEADO, N_DOC FROM contas_receber WHERE ID = '%s'",$codBoleto);
            
                $qryListaBuscarBoleto = mysqli_query($con, $queryBuscarBoleto);    
                while($resultado = mysqli_fetch_assoc($qryListaBuscarBoleto)){
                    $vetor[] = array_map('utf8_encode', $resultado); 
                }    

                //---/-Dados do boleto-/---//
                //-------------------------//
                $cod            = $vetor[0]['ID'];
                $status         = $vetor[0]['STATUS_2'];
                $bloqueado      = $vetor[0]['BLOQUEADO'];
                $nDoc           = $vetor[0]['N_DOC']; 
                $codContrato    = intval(split("/", $nDoc)[0]);        
                $dataPgto       = date("Y/m/d");
               
             
                //Fechar boleto
                $queryFecharBoleto = sprintf("UPDATE contas_receber SET `DATA_PAGAMENTO` = '%s',`STATUS_2` = 'FECHADO', 
                `FORMA_PGTO` = 'GERENCIANET', `VALOR_PAGAMENTO` = '%s' WHERE `ID` = '%s'", $dataPgto,$valorPago,$cod); 
                $qryFecharBoleto = mysqli_query($con, $queryFecharBoleto);


                //Verificar Renovação
                //------------------------------    
                //---------------------------------------------------
                
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

                //----------------------------------

                $queryLogBaixaBoleto = sprintf("INSERT INTO `db_opus`.`alteracoes_conta_Receber` (
                    `ID` , `DATA_ALTERACAO` ,`TIPO` , `CONTA_RECEBER_ID` ,`EMPRESA_ID` ,`OPERADOR_ID`)
                    VALUES ( NULL , CURRENT_TIMESTAMP(), '%s', '%s', '1', '100')", 
                    "BAIXOU UM BOLETO(".$valorPago.")",$cod); 
                $qryLogBaixaBoleto = mysqli_query($con, $queryLogBaixaBoleto);
                            
                $queryRadReply = sprintf("DELETE FROM radreply WHERE `username` = '%s' AND `value` LIKE 'BLOQUEADO'",$codContrato);
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
                    
    }


    echo "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual;
 
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}