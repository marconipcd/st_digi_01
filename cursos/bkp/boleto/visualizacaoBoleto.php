<?php

    if(isset($_REQUEST['link'])){
        $html = file_get_contents($_REQUEST['link']);

        echo $html;
    }else{
        echo "Boleto não emitido!";
    }

?>