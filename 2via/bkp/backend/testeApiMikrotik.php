<?php

    require('routeros_api.class.php');

    $enderecoIp = '179.127.36.91';
    $usuario    = 'rbdigital';
    $senha      = 'mkcolorau';

    if($enderecoIp != null && $enderecoIp != '' && 
            $usuario != null && $usuario != '' && 
            $senha != null && $senha != ''){
                
            $API = new RouterosAPI();
            //$API->debug = true;
            
            if ($API->connect($enderecoIp, $usuario, $senha)) {
                $API->write('/ppp/active/print');
                $clientesLogado = $API->read();

                foreach($clientesLogado as $num => $cliente_data) {
                    print_r($cliente_data[".id"]);
                    if($cliente_data['name'] == '6358'){
                        //echo 'sim';
                        $API->write('/ppp/active/remove', false);
                        $API->write("=numbers=" . $cliente_data[".id"], true);
                        $API->read();
                    }                    
                }
            }
        }
?>