<?php

if(isset($_REQUEST['jurosTotais']) && isset($_REQUEST['vlr'])){

    $juros = $_REQUEST['jurosTotais'];
    $valor = str_replace(".","",$_REQUEST['vlr']);
    $valor = str_replace(",",".",$valor); 

    $total = $valor + $juros;
    echo number_format($total,2,",",".");
}

?>