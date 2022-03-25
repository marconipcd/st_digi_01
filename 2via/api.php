
<?php

if(isset($_REQUEST['teste'])){
    
    fazerLogin("05872109407");
}


if(isset($_REQUEST['f']) && $_REQUEST['f'] = '2345423'  && isset($_REQUEST['cBo']) && isset($_REQUEST['lk']) && isset($_REQUEST['ci'])){
    gravarNnumeroGerenciaNet($_REQUEST['cBo'], $_REQUEST['lk'], $_REQUEST['ci']);
}

function curl($parametros){
        
    $cURLConnection = curl_init('http://172.17.0.71/2viaserver/api.php?'.$parametros);    
    curl_setopt($cURLConnection, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($cURLConnection, CURLOPT_POST, false);
    curl_setopt($cURLConnection, CURLOPT_HEADER, false);
    //curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $parametros);   
 
   
    $body = curl_exec($cURLConnection);

    return $body; 
}


function gravarNnumeroGerenciaNet($codBoleto, $nNumeroGerenciaNet, $transacao){
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
      
     if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

     $query = sprintf("UPDATE contas_receber SET N_NUMERO_GERENCIANET = '%s', TRANSACAO_GERENCIANET = '%s'  
     WHERE ID =%s;",$nNumeroGerenciaNet,$transacao, $codBoleto); 
     $qryLista = mysqli_query($con, $query);   

     echo $qryLista;
}

function fazerLogin($cpf_cnpj){
    
echo 'teste';
    $parametros = "funcao=fazerLogin&&".
                  "cpf_cnpj=".$cpf_cnpj;
    
    $r = curl($parametros); 
    $r = json_decode($r);   
    
    print_r($r);
    
    return $r;
}

function fazerLoginPorContrato($codContrato){

    $parametros = "funcao=fazerLoginPorContrato&&".
                  "cod_contrato=".$codContrato;
    
    $r = curl($parametros); 
    $r = json_decode($r);   
    
    return $r;
}

function buscarContratos ($codCliente){

    $parametros = "funcao=buscarContratos&&".
                  "cod_cliente=".$codCliente;

    $r = curl($parametros); 
    $r = json_decode($r);   

    return $r;
}

function selecionarContrato($codContrato){
    $parametros = "funcao=selecionarContrato&&".
                  "cod_contrato=".$codContrato;

    $r = curl($parametros); 
    $r = json_decode($r);   

    return $r;
}

function buscarBoletos($codContrato){
    $parametros = "funcao=buscarBoletos&&".
                  "cod_contrato=".$codContrato;

    $r = curl($parametros); 
    $r = json_decode($r);   

    return $r;
 }
 function buscarAtendimentos($codContrato){
    $parametros = "funcao=buscarAtendimentos&&".
                  "cod_contrato=".$codContrato;

    $r = curl($parametros); 
    $r = json_decode($r);   

    return $r;
}
function buscarIndicacoes($codCliente){

    $parametros = "funcao=buscarIndicacoes&&".
                  "cod_cliente=".$codCliente;

    $r = curl($parametros); 
    $r = json_decode($r);   

    return $r;
}

function calcularJuros($vlr, $dataVencimento, $codBoleto){
            

    $oneDay = 24*60*60*1000; 
    $dataHoje = new DateTime();
    $dataVenc = new DateTime($dataVencimento);
    $intervalo = $dataHoje->diff($dataVenc);
    $dias = $intervalo->d;

    if($dataVenc < $dataHoje && $dias >= 2){
        
        $juros = (float)0.00;
        $multa = (float)2.00;
                
        $jurosTotais = (float)0.00;
       
        $juros = (float)0.03333 * $dias;
            
        $jurosTotais = (float)$juros + (float)$multa;
        
        $vlr = str_replace(".","",$vlr);
        $vlr = str_replace(",",".",$vlr);

        $jurosFinal = (((float)$vlr * $jurosTotais) / 100);
        $vlrAtualizado =  (float)$vlr + (float)$jurosFinal;
        $vlrAtualizado1 = number_format($vlrAtualizado, 2);
        $vlrAtualizado2 =   str_replace(".",",",$vlrAtualizado1);
        
        return $vlrAtualizado2;
    }else{
        return $vlr;
    }
}

function primeiro_segundo_nome($nome){
    
    $str = $nome;
    $res = explode(" ",$str);
    return $res[0] . ' ' . $res[1];
}

function esconderNome($nome) {
      
      $str = $nome;
      $res = substr($str,0, 10);
      return $res . '*****';
  }
  function   esconderCPF($cpf) {
      
      $str = $cpf;
      $res = substr($str,0, 8);
      return $res . '*****';
  }
  function esconderTelefone($telefone) {
      
      $str = $telefone;
      $res = substr($str,0, 6);
      return $res . '*****';
  }
  function esconderEMAIL($email) {
      
    if($email != null && strlen($email) > 0){
        $str = $email;
        $res = explode("@",$str);
        return substr($res[0],0,4) . '*****@' . $res[1];

    }
  }

?>