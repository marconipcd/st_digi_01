<?php



    $cpf = "05872109407";
    $parametros = "cpf_cnpj=".$cpf;

    $cURLConnection = curl_init('http://172.17.0.71/2viaserver/fazerLogin.php');    
    curl_setopt($cURLConnection, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($cURLConnection, CURLOPT_HEADER, false);
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $parametros);    
   
    $body = curl_exec($cURLConnection);

    $r =  json_decode(json_encode($body));   

    print_r($r);
   // print_r($r[0]->ID);
    




?>