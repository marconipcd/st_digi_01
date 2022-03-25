<?php
header('Content-Type: text/html; charset=ISO-8859-1');
        //Content-Type: ; charset=ISO-8859-1
//echo 'teste';
if(isset($_REQUEST['boleto'])){


if(!function_exists('curl_init')) {
	die('cURL not available!');
}
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v2/checkout'); 
curl_setopt($curl, CURLOPT_FAILONERROR, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


$codBoleto = $_REQUEST['boleto'];
$codContrato = $_REQUEST['codContrato'];
$nomeCliente = $_REQUEST['nomeCliente'];
$valorFatura = str_replace('.','',$_REQUEST['valorFatura']);
$valorFatura = str_replace(',','.',$valorFatura);

$dddTelefone = $_REQUEST['dddTelefone'];
$telefone = $_REQUEST['telefone'];
$emailCliente = $_REQUEST['emailCliente'];
$endereco = $_REQUEST['endereco'];
$numero = $_REQUEST['numero'];
$cidade = $_REQUEST['cidade'];
$uf = 'PE';
$pais = 'BRASIL';
$cep = $_REQUEST['cep'];


$postData = array('email' => 'vendas@digitalonline.com.br', 
                  'token' => 'E7A0753645654BEAB15E38680F949FFE',
                  'currency'=>'BRL',
                  'itemId1'=>'01',
                  'itemDescription1'=>'Fatura Contrato - '.$codContrato,
                  'itemAmount1'=>$valorFatura,
                  'itemQuantity1'=>'1',
                  'reference'=>$codBoleto,
                  'senderName'=>$nomeCliente,
                  'senderAreaCode'=>$dddTelefone,
                  'senderPhone'=>$telefone,
                  'senderEmail'=>strtolower($emailCliente),
                  'shippingType'=>'1',
                  'shippingAddressStreet'=>$endereco,
                  'shippingAddressNumber'=>$numero,
                  'shippingAddressDistrict'=>'Internet',
                  'shippingAddressPostalCode'=>$cep,
                  'shippingAddressCity'=>$cidade,
                  'shippingAddressState'=>$uf,
                  'shippingAddressCountry'=>$pais);

                 // print_r($postData);

//&itemWeight1=1000
//&shippingAddressRequired=true
//&timeout=25
//&enableRecovery=false


curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));

$output = curl_exec($curl);
if ($output === FALSE) {
  echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
 // echo $output;
}
else {

  $xml = simplexml_load_string($output);
  echo  $xml->code;
  //echo substr($output,73,32) ;


}
}
?>