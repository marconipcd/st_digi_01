<?php
    if(isset($_REQUEST['url']) != null){
        ?>
            <input type="button" onclick="printDiv('content')" value="Preparar Impressão" />
            <h2 style="margin: 0 12%;margin-top: 0px;font-size: 12px;margin-top: 22px;text-align: justify;border-bottom: 1px dotted #000;padding-bottom: 11px;">
            "Se este boleto foi gerado agora, favor aguardar de 2 a 3 horas até que o mesmo seja registrado no banco emissor.
            Essa é uma exigência da Federação Brasileira dos Bancos (FEBRABAN) para dar maior segurança ao seu pagamento"
            </h2>


                <?php
                $html = file_get_contents($_REQUEST['url']);
                ?>
                <div id="content" name="content">
                    <?php
                       
                        echo $html;
                    ?>

                </div>
                
                <div id="loading" name="loading" style="display:none;text-align: center;">
                <h1 style="margin-top: 100px;">Seu boleto será impresso em nova aba!</h1>
                    
                </div>
        
            <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

            <script>               
               function printDiv(divName) {
                    //var printContents = document.getElementById(divName).innerHTML;
                    //var originalContents = document.body.innerHTML;
                    //document.body.innerHTML = printContents;
                    //window.print();
                    //document.body.innerHTML = originalContents;
                    document.getElementById("content").style.display = 'none';
                    document.getElementById("loading").style.display = 'block';

                    var st1 =  "<input type='button' onclick='print()' value='Imprimir' />";
                    var st2 = document.getElementById(divName).innerHTML;  
                    var conteudo = st1.concat(st2);

                    var win = window.open();  
                    win.document.body.innerHTML = conteudo;  
                    
                    

                }

                function print(){
                    window.print();
                }
            </script>
        <?php
    }
?>