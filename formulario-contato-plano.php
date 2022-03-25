<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <style>
        .form-mobile {
            display: none;
        }

        .form-desktop {
            display: block;
        }

        @media only screen and (max-width: 700px) {
            .form-mobile {
                display: block;
            }

            .form-desktop {
                display: none;
            }
        }



        .form-control {
            margin-top: 6px;
        }
    </style>

</head>

<body>

    <div class="form-desktop">

        <div class="container">

            <!-- nome -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtNomeCompleto" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* nome completo" required />
                    </div>
                </div>
            </div>

            <!-- cpf, rg -->
           <div class="row">
                <div class="col-6">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCPF" value="" size="40" aria-invalid="false" placeholder="* cpf" required />
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtRG" value="" size="40" aria-invalid="false" placeholder="rg" />
                    </div>
                </div>
            </div>

            <!-- telefone, telefone alternativo, email -->
            <div class="row">
                <div class="col-4">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="tel" id="txtTelefone" value="" size="40" aria-required="true" aria-invalid="false" placeholder="* telefone com DDD" required />
                    </div>

                </div>
                <div class="col-4">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="tel" id="txtTelefonesecundrio" value="" size="40" aria-invalid="false" placeholder="telefone alternativo com DDD" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="email" id="txtEmail" value="" size="40" aria-invalid="false" placeholder="* e-mail" required />
                    </div>
                </div>

            </div>

            <!-- cep, endereco, bairro, cidade -->
            <div class="row">

                <div class="col-2">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCEP" value="" size="40" aria-invalid="false" placeholder="cep" />
                    </div>

                </div>
                <div class="col-6">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtRuaAvenidaTravessa" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* endereço com número" required />
                    </div>
                </div>
                <div class="col-2">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtBairro" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* bairro" required />
                    </div>

                </div>


                <div class="col-2">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCidade" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* cidade" required />
                    </div>

                </div>

            </div>

            <!-- complemento, ponto de referencia, melhor horário -->
            <div class="row">


                <div class="col-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtComplementoApartamento1andar" value="" size="40" aria-invalid="false" placeholder="complemento" />
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtPontodereferncia" value="" size="40" aria-invalid="false" placeholder="ponto de referência" />
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtMelhorhorrioparaentrarmosemcontatocomvoc" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="Qual horário podemos entrar em contato ?" />
                    </div>
                </div>
            </div>



            <div id="notify-msg" class="alert alert-success" style="display:none;margin-top: 8px;">
                <strong>Obrigado pelo seu contato!</strong> nós recebemos sua mensagem com sucesso.
            </div>

            <div id="notify-msg-erro" class="alert alert-danger" style="display:none;margin-top: 8px;">
                <strong>Erro!</strong> Não foi possível enviar sua mensagem no momento.
            </div>

            <br />
            <span>( * ) Campos obrigatórios</span>
            <br />

            <div style="width: 100% !important; text-align:center;">
                <input id="btEnviar" class="btEnviar btn btn-primary" type="submit" value="SOLICITAR PLANO" />
            </div>
        </div>

    </div>

    <div class="form-mobile">
        <div class="container">

            <!-- nome -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtNomeCompleto" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* nome completo" required />
                    </div>
                </div>
            </div>

            <!-- cpf -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCPF" value="" size="40" aria-invalid="false" placeholder="* cpf" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtRG" value="" size="40" aria-invalid="false" placeholder="rg" />
                    </div>
                </div>
            </div>

            <!-- telefone, telefone alternativo, email -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="tel" id="txtTelefone" value="" size="40" aria-required="true" aria-invalid="false" placeholder="* telefone com DDD" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="tel" id="txtTelefonesecundrio" value="" size="40" aria-invalid="false" placeholder="telefone alternativo com DDD" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="email" id="txtEmail" value="" size="40" aria-invalid="false" placeholder="* e-mail" required />
                    </div>
                </div>
            </div>

            <!-- cep, endereco, bairro, cidade -->
            <div class="row">
                <div class="col-12">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCEP" value="" size="40" aria-invalid="false" placeholder="cep" />
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtRuaAvenidaTravessa" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* endereço com número" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtBairro" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* bairro" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtCidade" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="* cidade" required />
                    </div>
                </div>
            </div>

            <!-- complemento, ponto de referencia, melhor horário -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtComplementoApartamento1andar" value="" size="40" aria-invalid="false" placeholder="complemento" />
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtPontodereferncia" value="" size="40" aria-invalid="false" placeholder="ponto de referência" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group" style="margin-bottom:0;">
                        <input class="form-control" style="margin-bottom:0;" type="text" id="txtMelhorhorrioparaentrarmosemcontatocomvoc" value="" size="40" class="  " aria-required="true" aria-invalid="false" placeholder="Qual horário podemos entrar em contato ?" />
                    </div>
                </div>
            </div>



            <div id="notify-msg" class="alert alert-success" style="display:none;margin-top: 8px;">
                <strong>Obrigado pelo seu contato!</strong> nós recebemos sua mensagem com sucesso.
            </div>

            <div id="notify-msg-erro" class="alert alert-danger" style="display:none;margin-top: 8px;">
                <strong>Erro!</strong> Não foi possível enviar sua mensagem no momento.
            </div>

            
            <span>( * ) Campos obrigatórios</span>
            <br />
            <br />

            <div style="width: 100% !important; text-align:center;">
                <input id="btEnviar" class="btEnviar btn btn-primary" type="submit" value="SOLICITAR PLANO" />
            </div>
        </div>
    </div>




</body>

</html>






<script>

    $(document).ready(function() {
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };

        if(isMobile.any()){
            $(".form-desktop").remove();
        }else{
            $(".form-mobile").remove();
        }
    });

    $('#form-contact').submit(function(e) {
        e.preventDefault();

        document.getElementById("btEnviar").value = "ENVIANDO..."
        document.getElementById("btEnviar").disabled = true;

        var plano = $("input[name='radio']:checked").val();
        var nome_completo = $('#txtNomeCompleto').val();
        var cpf = $('#txtCPF').val();
        var rg = $('#txtRG').val();
        var telefone = $('#txtTelefone').val();
        var telefoneSecundario = $('#txtTelefonesecundrio').val();
        var email = $('#txtEmail').val();
        var cep = $('#txtCEP').val();
        var endereco = $('#txtRuaAvenidaTravessa').val();
        var bairro = $('#txtBairro').val();
        var cidade = $('#txtCidade').val();
        var complemento = $('#txtComplementoApartamento1andar').val();
        var referencia = $('#txtPontodereferncia').val();
        var melhor_horario = $('#txtMelhorhorrioparaentrarmosemcontatocomvoc').val();


        $.ajax({
            url: '../api.php',
            type: 'POST',
            dataType: 'text',
            data: {
                contato_residencia: true,
                plano: plano,
                nome_completo: nome_completo,
                cpf: cpf,
                rg: rg,
                telefone: telefone,
                telefoneSecundario: telefoneSecundario,
                email: email,
                cep: cep,
                endereco: endereco,
                bairro: bairro,
                cidade: cidade,
                complemento: complemento,
                referencia: referencia,
                melhor_horario: melhor_horario
            }
        }).done(function(e) {
            console.log('Enviado');
            document.getElementById("btEnviar").value = "ENVIADO";

            $("#notify-msg").css("display", "block");

            $('#txtNomeCompleto').val("");
            $('#txtCPF').val("");
            $('#txtRG').val("");
            $('#txtTelefone').val("");
            $('#txtTelefonesecundrio').val("");
            $('#txtEmail').val("");
            $('#txtCEP').val("");
            $('#txtRuaAvenidaTravessa').val("");
            $('#txtBairro').val("");
            $('#txtCidade').val("");
            $('#txtComplementoApartamento1andar').val("");
            $('#txtPontodereferncia').val("");
            $('#txtMelhorhorrioparaentrarmosemcontatocomvoc').val("");


        }).fail(function(e) {

            $("#notify-msg-erro").css("display", "block");

        });


    });
</script>