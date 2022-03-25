<?php
 
require __DIR__.'/../../vendor/autoload.php'; // caminho relacionado a SDK
 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = 'Client_Id_63482208bd6f9994a81051bd2ddbd03302394ba3'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_f40232c24244bf2c1c36e390ba48c8521bbd2961'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
/*
* Este token será recebido em sua variável que representa os parâmetros do POST
* Ex.: $_POST['notification']
*/
$token = $_REQUEST["notification"];

print_r($token);
 
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
    $statusAtual = $status["current"];
    
    // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS
  
    echo "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual;
 
    //print_r($chargeNotification);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}