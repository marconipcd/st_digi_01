<?php
ini_set ('default_charset', 'UTF8');
require __DIR__ . '/../api/vendor/autoload.php';

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$clientId = 'Client_Id_54f90d0f28cdd7c03a23458298932bd8cc462112';
$clientSecret = 'Client_Secret_cadbbcad01cdc8833a0db11ab369884251f38c8c';

$options = [
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'sandbox' => false
];

if (isset($_POST)) {

    $item_1 = [
        'name' => $_POST["descricao"],
        'amount' => (int) $_POST["quantidade"],
        'value' => (int) $_POST["valor"]
    ];

    $items = [
        $item_1
    ];

    $metadata = array('notification_url'=>'https://digitalonline.com.br/2via/boleto/notify2.php','custom_id'=>$_POST["codBoleto"]);

    $body = ['items' => $items,'metadata'=>$metadata];

    try {
        $api = new Gerencianet($options);
        $charge = $api->createCharge([], $body);
        if ($charge["code"] == 200) {

            $params = ['id' => $charge["data"]["charge_id"]];

            $customer;
            
                if(isset($_REQUEST['email']) && $_REQUEST['email'] != null) {  
                    
                    if(strlen($_POST["cpf"]) > 11){
                        $juridical_data = [
                            'corporate_name' => $_POST["nome_cliente"], // nome da razão social
                            'cnpj' => $_POST["cpf"] // CNPJ da empresa, com 14 caracteres
                        ];

                        $customer = [                                            
                            'email' => $_REQUEST['email'],
                            'phone_number' => $_POST["telefone"],
                            'juridical_person' => $juridical_data,
                        ];
                    }else{
                        $customer = [                                            
                            'email' => $_REQUEST['email'],
                            'name' => $_POST["nome_cliente"],
                            'cpf' => $_POST["cpf"],
                            'phone_number' => $_POST["telefone"]
                        ];
                    }

                    
                }else{

                    if(strlen($_POST["cpf"]) > 11){
                        $juridical_data = [
                            'corporate_name' => $_POST["nome_cliente"], // nome da razão social
                            'cnpj' => $_POST["cpf"] // CNPJ da empresa, com 14 caracteres
                        ];

                        $customer = [
                            'juridical_person' => $juridical_data,                            
                            'phone_number' => $_POST["telefone"]
                        ];
                    }else{

                        $customer = [
                            'name' => $_POST["nome_cliente"],
                            'cpf' => $_POST["cpf"],
                            'phone_number' => $_POST["telefone"]
                        ];
                    }
                }
          //  }

            $data_brasil = DateTime::createFromFormat('d/m/Y', $_REQUEST['vencimento']);

            //Formatando a data, convertendo do estino brasileiro para americano.
            $dt_atual		= date("Y-m-d"); // data atual
            $timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
            $dt_expira		= $data_brasil->format('Y-m-d'); // data de expiração do anúncio
            $timestamp_dt_expira	= strtotime($dt_expira);

            if ($timestamp_dt_atual > $timestamp_dt_expira){
                $data_brasil = DateTime::createFromFormat('d/m/Y', date("d/m/Y"));
            }
           
            
            //--Buscar instruções
            $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
            
            $queryBuscarInstrucoes = sprintf("SELECT DEMONSTRATIVO1, DEMONSTRATIVO2, INSTRUCOES1  FROM conta_bancaria WHERE ID = 5");            
            $qryListaBuscarInstrucoes = mysqli_query($con, $queryBuscarInstrucoes);    


             while($resultado = mysqli_fetch_assoc($qryListaBuscarInstrucoes)){
                    $rBInstrucoes[] = array_map('utf8_encode', $resultado);
                    
                }    
            
            $d1 = str_replace('<br/>',"",$rBInstrucoes[0]['DEMONSTRATIVO1']);
            $d2 = str_replace('<br/>',"",$rBInstrucoes[0]['DEMONSTRATIVO2']);
            $d3 = str_replace('<br/>',"",$rBInstrucoes[0]['INSTRUCOES1']);


            $msg1 = strlen($d1) > 100 &&  strlen($d1) < 200 ? substr($d1,0,100)."\n".substr($d1,101, strlen($d1)) : $d1;
            $msg2 = strlen($d2) > 100 &&  strlen($d2) < 200 ? substr($d2,0,100)."\n".substr($d2,101, strlen($d2)) : $d2;
            $msg3 = strlen($d3) > 100 &&  strlen($d3) < 200 ? substr($d3,0,100)."\n".substr($d3,101, strlen($d3)) : $d3;

            $message = "Após o vencimento, sujeito a suspensão dos serviços e posterior envio aos orgãos de cobranca"."\n"."conforme prazos contratuais. "."\n"."S.A.C.: 0800-081-3125, www.digitalonline.com.br";
            
            $bankingBillet = [
                'expire_at' => $data_brasil->format('Y-m-d'),
                'customer' => $customer,
                'message' => $message
            ];
            $payment = ['banking_billet' => $bankingBillet];
            $body = ['payment' => $payment];

            $api = new Gerencianet($options);
            $pay_charge = $api->payCharge($params, $body);
            echo json_encode($pay_charge);
        } else {
            
        }
    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
} 