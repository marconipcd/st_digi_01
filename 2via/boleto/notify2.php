<?php


if(isset($_REQUEST['notification'])){

  $parametros = "notification=".$_REQUEST['notification'];
  
     
  $cURLConnection = curl_init('http://179.127.32.7:8989/2via/boleto/notify2.php');
  curl_setopt($cURLConnection, CURLOPT_POST, 1);
  curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $parametros);
  curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/x-www-form-urlencoded',
      'Accept: application/json'
  ));

  $apiResponse = curl_exec($cURLConnection);
  $erro = curl_error($cURLConnection);        
  $i = curl_getinfo($cURLConnection);
  
  print_r($apiResponse);
  print_r($i);
  
  curl_close($cURLConnection);

}


?>