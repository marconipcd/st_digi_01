<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="home">
        <div class="login-screen">

            <div class="header">

                <div style="float:left;" class="header-saudacao">
                    <h2 v-for="cliente in cliente_selecionado">
                        Olá, <strong><?php echo primeiro_segundo_nome($cliente->NOME_RAZAO); ?></strong>
                    </h2>

                </div>

                <div class="logo-painel" style="float:right;">
                    <img style="width: 9em; margin: 0 auto;" src="images/logo-painel.png" />
                </div>

                <div style="clear:both;"></div>
            </div>

            <?php
                if(isset($_REQUEST['page']) && $_REQUEST['page'] == "indicacoes"){
           
                }else{

                    if($contrato_selecionado[0]->NOME_CONTRATO == "RESIDENCIA"){
            ?>
                <button style="margin: 0;" type="submit" class="btn btn-primary btn-large btn-block btn-quero-indicar" href="#">QUERO INDICAR UM AMIGO</button>
            <?php
                    }
                }
            ?>



            <div class="tab-content">
                <div id="dados" class="tab-pane active">
                    <br />              
                    
                    <?php
                        
                        if(isset($_REQUEST['page']) && $_REQUEST['page'] == "indicacoes"){
                            include_once('indicados.php');                    
                        }else{
                            include_once('dados_cadastrais.php');                    
                            include_once('faturas.php');                    
                            include_once('consumo.php'); 
                            include_once('atendimentos.php');

                            if($contrato_selecionado[0]->NOME_CONTRATO == "RESIDENCIA"){
                                include_once('indicacoes.php');
                            }
                        }
                    ?>

                </div>

            </div>
        </div>
    </div>




</body>

</html>




<script>



$( document ).ready(function() {
    
    $( ".select_contratos" ).change(function() {
        var codContrato = $( ".select_contratos" ).val();
                
        window.location.href = 'index.php?codContrato='+codContrato;        
        console.log(codContrato);
    });

    $(".btn-quero-indicar").click(function (e){

        e.preventDefault();

        var codContrato = $("#txtCodContrato").val();
        window.location.href = '?codContrato='+codContrato+'&page=indicacoes';        
        console.log(codContrato);
    });
});


    

</script>