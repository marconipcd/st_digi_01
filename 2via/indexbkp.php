<?php
include_once("recaptchalib.php");
include_once("api.php");

$logado = false;
$cliente = null;
$contratos = null;
$contrato_selecionado = null;
$atendimentos = null;
$boletos = null;
$indicacoes = null;

$secret = "6Ld_0LcZAAAAANKMSs80YjOLF8_ExkH5XLfBrNGa";

$response = null;
$reCaptcha = new reCaptcha($secret);
if (isset($_POST['g-recaptcha-response']) && isset($_REQUEST['cpf_cnpj']) && $_REQUEST['cpf_cnpj'] != '') {

    $response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
    
    if ($response != null && $response->success) {
        
        $cpf_cnpj = $_REQUEST['cpf_cnpj'];        
        $cliente = fazerLogin($cpf_cnpj);
        echo 'teste';
        print_r($cliente);
                
        if($cliente != null){
            $logado = true;

            $contratos = buscarContratos($cliente[0]->ID);
            $contrato_selecionado = selecionarContrato($contratos[0]->ID);
            $boletos = buscarBoletos($contrato_selecionado[0]->ID);
            $atendimentos = buscarAtendimentos($contrato_selecionado[0]->ID);
            $indicacoes = buscarIndicacoes($cliente[0]->ID);

        }  
    }
}

if(isset($_REQUEST['codContrato'])){
        
        $cliente = fazerLoginPorContrato($_REQUEST['codContrato']);
                
        if($cliente != null){
            $logado = true;

            $contratos = buscarContratos($cliente[0]->ID);
            $contrato_selecionado = selecionarContrato($_REQUEST['codContrato']);   
            $boletos = buscarBoletos($_REQUEST['codContrato']);         
            $atendimentos = buscarAtendimentos($_REQUEST['codContrato']);
            $indicacoes = buscarIndicacoes($cliente[0]->ID);
            //print_r($indicacoes);
        }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <title>Central do Assinante - DIGITAL</title>

    <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
</head>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>


<script src="js/Chart.bundle.min.js"></script>

<link href="css/lity.min.css" rel="stylesheet">
<script src="js/lity.min.js"></script>

<body>

    <div id="app">

        <?php
        if (!$logado) {
        ?>

            <div class="login">
                <div class="login-screen" style="width:334px;">
                    <div class="app-title">
                        <img style="width: 18em; margin: 1em auto;" src="images/logo-login.png" />
                    </div>
                    <!--<div v-if="mostrar_erro_login == true" class="alert alert-danger">
                        <div style="text-align:center;">
                            <strong>Desculpe!</strong>
                        </div>
                        Não encontramos nenhum contrato para o CPF/CNPJ informado.
                    </div>
                    <div v-if="mostrar_erro_login_null == true" class="alert alert-danger">
                        <div style="text-align:center;">
                            <strong>Porfavor!</strong>
                        </div>
                        Informe um CPF ou CNPJ para consulta.
                    </div>-->
                    <div class="login-form">
                        <form method="POST">
                            <div class="control-group">
                                <input name="cpf_cnpj" type="number" class="login-field" value="" placeholder="CPF/CNPJ" id="cpf-cnpj">
                                <label class="login-field-icon fui-user" for="cpf-cnpj"></label>
                            </div>


                            <div class="g-recaptcha" data-sitekey="6Ld_0LcZAAAAALyJgNa1qRItKJtyGgpVrkEFK4te"></div>

                            <br />
                            <button type="submit" class="btn btn-primary btn-large btn-block" href="#">Entrar</button>



                        </form>
                    </div>
                </div>
            </div>

            <div style="width: 51%; margin: 0 auto;text-align: center;line-height: 1.1em;" v-if="mostrarLogin  && !mostrarFormIndicacao" class="info_login">
                <img style="width: 88%;" src="images/bem-vindo.png"> <br />
                <p style="color:#fff;">
                    <span style="font-size: 14px;">
                        Digite o CPF ou CNPJ do Titular do contrato e tenha acesso a:<br />
                        PAGAMENTOS DE BOLETOS, HISTÓRICO DE CONSUMO e HISTÓRICO DE CONTATOS.<br />
                    </span>
                    <br />
                    <span style="font-size: 12px;">
                        Caso não consiga acessar, favor nos informe através de um desses canais de atendimento:<br />
                        <br />
                        contato@digitalonline.com.br<br />
                        <a style="color:rgb(66, 66, 66);" target="_blank" href="http://digitalonline.com.br/atendimento/">www.digitalonline.com.br/atendimento/</a><br />
                        <br />
                        Ou ligue (81) 3726-3125 ou <span style="color:rgb(66, 66, 66);">0800 081 3125</span> <br />
                        Ou se preferir pelo <a style="color:#fff; text-decoration: underline;" target="_blank" href="https://api.whatsapp.com/send?phone=5581996121286"> whatsapp 81 9 9612-1286</a>.
                    </span>
                </p>
                <br />
                <img src="images/logo_digital_branco.png" width="190">
            </div>
        <?php } ?>

        <?php
        if ($logado) {
            include_once('app.php');
        ?>

        <?php
        }
        ?>


    </div>


</body>

</html>