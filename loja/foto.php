<?php 
   //Here write your code to get $byte_array
    $foto = $_REQUEST['foto'];
    
    header('Content-Type: image/png');
    

    print $foto;
?>