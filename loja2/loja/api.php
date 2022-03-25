<?php


//listarProdutos();
//buscarProduto("15808");

function listarProdutos(){


    $cURLConnection = curl_init('http://179.127.32.7:8989/loja_virtual/listar_produtos.php');
    curl_setopt($cURLConnection, CURLOPT_POST, 1);
    //curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $parametros);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: application/json'
    ));

    $apiResponse = curl_exec($cURLConnection);
    $erro = curl_error($cURLConnection);        
    $i = curl_getinfo($cURLConnection);
    
    
    //print_r($apiResponse);
    
    curl_close($cURLConnection);

    return $apiResponse;

}

function buscarProduto($codProduto){


    //$parametros = "{p:".$codProduto."}";
    $parametros = "p=".$codProduto;

    $cURLConnection = curl_init('http://179.127.32.7:8989/loja_virtual/buscar_produto.php');
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
    
    
    //print_r($apiResponse);
    
    curl_close($cURLConnection);

    return $apiResponse;

}




?>