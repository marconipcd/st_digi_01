<?php
    header('Content-Type: text/html; charset=ISO-8859-1');

      
    if(isset($_REQUEST['notificationCode'])){
       $parametros = "notificationCode=".$_REQUEST['notificationCode'];
 
     
       $cURLConnection = curl_init('http://179.127.32.7:8989/2via/backend/notify.php');
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