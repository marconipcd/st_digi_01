<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br/>
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Faturas</h4>
        </div>
        <div class="card-body">
            <div style="text-align: center;line-height: 0.9em; margin: 0.7em 0;">
                <span style="font-size: 0.7em;">O "E-MAIL" É FORMA DE CONTATO QUE O PAGUE SEGURO UTILIZA PARA INFORMAR STATUS DO PAGAMENTO,
                    <br /> A INCONSISTÊNCIA NA INFORMAÇÃO DO <strong>E-MAIL</strong> E <strong>CPF</strong> DO PAGADOR, PODE DEIXÁ-LO IMPOSSIBILITADO DE POSTERIORES RECLAMAÇÕES.</span></div>


            <div class="table-responsive">

                <?php
                if ($boletos != null) {
                ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Documento</th>
                                <th>Valor</th>

                                <th>Vencimento</th>
                                <th>Status</th>
                                <th>Pagamento</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($boletos as $fatura) {

                                $dataHoje = new DateTime();
                                $dataVencimento = new DateTime($fatura->DATA_VENCIMENTO);

                                if ($dataVencimento < $dataHoje) {

                            ?>



                                    <tr>

                                        <td>

                                            <strong class="bloqueado"><?php echo $fatura->ID; ?></strong>
                                        </td>
                                        <td>
                                            <strong class="bloqueado"><?php echo $fatura->N_DOC; ?></strong>

                                        </td>
                                        <td>

                                            <!-- fALTA cALCULAR OS jUROS -->
                                            <strong class="bloqueado"><?php echo $fatura->VALOR_TITULO; ?></strong>

                                        </td>
                                        <td>

                                            <strong class="bloqueado">
                                                <?php echo date("d/m/Y", strtotime($fatura->DATA_VENCIMENTO)); ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <strong class="bloqueado"><?php echo $fatura->STATUS_2; ?></strong>
                                        </td>

                                        <td style="width: 1em;">

                                            <div class="btn-group" style="width: 14em;">



                                                <?php
                                                if ($contrato_selecionado[0]->CATEGORIA == "CORPORATIVO") {
                                                ?>
                                                    <button n_numero="<?php echo $fatura->N_NUMERO_GERENCIANET; ?>" vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-boleto" type="button" style="width: 8em; margin-left: 2px;">Imprimir Boleto</button>
                                                <?php
                                                } else {
                                                ?>

                                                    <button vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-cartao" type="button">Cartão</button>
                                                    <button n_numero="<?php echo $fatura->N_NUMERO_GERENCIANET; ?>" vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-boleto" type="button" style="width: 8em; margin-left: 2px;">Imprimir Boleto</button>

                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                } else {
                                ?>
                                    <tr>

                                        <td>

                                            <strong><?php echo $fatura->ID; ?></strong>
                                        </td>
                                        <td>
                                            <strong><?php echo $fatura->N_DOC; ?></strong>

                                        </td>
                                        <td>

                                            <!-- fALTA cALCULAR OS jUROS -->
                                            <strong><?php echo $fatura->VALOR_TITULO; ?></strong>

                                        </td>
                                        <td>

                                            <strong>
                                                <?php echo date("d/m/Y", strtotime($fatura->DATA_VENCIMENTO)); ?>
                                            </strong>
                                        </td>
                                        <td>
                                            <strong><?php echo $fatura->STATUS_2; ?></strong>
                                        </td>

                                        <td style="width: 1em;">

                                            <div class="btn-group" style="width: 14em;">



                                                <?php
                                                if ($contrato_selecionado[0]->CATEGORIA == "CORPORATIVO") {
                                                ?>
                                                    <button n_numero="<?php echo $fatura->N_NUMERO_GERENCIANET; ?>" vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-boleto" type="button" style="width: 8em; margin-left: 2px;">Imprimir Boleto</button>
                                                <?php
                                                } else {
                                                ?>

                                                    <button vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-cartao" type="button">Cartão</button>


                                                    <button n_numero="<?php echo $fatura->N_NUMERO_GERENCIANET; ?>" vencimento="<?php echo $fatura->DATA_VENCIMENTO; ?>" valor="<?php echo $fatura->VALOR_TITULO; ?>" name="<?php echo $fatura->ID; ?>" class="btn btn-primary btn-pagar-boleto" type="button" style="width: 8em; margin-left: 2px;">Imprimir Boleto</button>

                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>

                <?php
                }
                ?>
            </div>

            <?php
            if ($boletos == null) {
            ?>
                <div v-if="login.$data.faturas.length == 0" class="alert alert-info">
                    Nenhuma fatura foi encontrada!
                </div>
            <?php
            }
            ?>

        </div>
    </div>

</body>

</html>

<input id="txtCodContrato" value="<?php echo $contrato_selecionado[0]->ID; ?>" style="display:none;" />
<input id="txtCpfCnpj" value="<?php echo $cliente[0]->DOC_CPF_CNPJ; ?>" style="display:none;" />
<input id="txtNomeCliente" value="<?php echo $cliente[0]->NOME_RAZAO; ?>" style="display:none;" />
<input id="txtDDDFone1" value="<?php echo $cliente[0]->DDD_FONE1; ?>" style="display:none;" />
<input id="txtTelefone1" value="<?php echo $cliente[0]->TELEFONE1; ?>" style="display:none;" />
<input id="txtEmail" value="<?php echo $cliente[0]->EMAIL; ?>" style="display:none;" />
<input id="txtEndereco" value="<?php echo $contrato_selecionado[0]->ENDERECO; ?>" style="display:none;" />
<input id="txtNumero" value="<?php echo $contrato_selecionado[0]->NUMERO; ?>" style="display:none;" />
<input id="txtCidade" value="<?php echo $contrato_selecionado[0]->CIDADE; ?>" style="display:none;" />
<input id="txtCep" value="<?php echo $contrato_selecionado[0]->CEP; ?>" style="display:none;" />
<input id="txtCategoria" value="<?php echo $contrato_selecionado[0]->CATEGORIA; ?>" style="display:none;" />

<script>
    $(document).ready(function() {

        $(".btn-pagar-cartao").click(function() {

            var $btClicado = $(this);
            var codBoleto = $btClicado.attr("name");
            var valorBoleto = $btClicado.attr("valor");
            var codContrato = $("#txtCodContrato").val();
            var nomeCliente = $("#txtNomeCliente").val();
            var dddFone1 = $("#txtDDDFone1").val();
            var telefone1 = $("#txtTelefone1").val();
            var email = $("#txtEmail").val();
            var endereco = $("#txtEndereco").val();
            var numero = $("#txtNumero").val();
            var cidade = $("#txtCidade").val();
            var cep = $("#txtCep").val();


            //---Inicio---Cálculo de Juros
            var vencimentoBoleto = $btClicado.attr("vencimento");
            var str = vencimentoBoleto.toString();
            var res = str.split("-");
            var firstDate = new Date(res[0], res[1] - 1, res[2]);
            console.log(firstDate);
            if (firstDate < new Date()) {
                console.log("boleto atrasado");
                var valorNovo = calcularJuros(valorBoleto, firstDate, codBoleto);
                valorBoleto = valorNovo;
            }
            //---Inicio---Cálculo de Juros


            $.ajax({
                dataType: 'text',
                type: 'POST',
                data: {
                    boleto: codBoleto,
                    codContrato: codContrato,
                    valorFatura: valorBoleto,
                    nomeCliente: nomeCliente,
                    dddTelefone: dddFone1,
                    telefone: telefone1,
                    emailCliente: email,
                    endereco: endereco,
                    numero: numero,
                    cidade: cidade,
                    cep: cep
                },
                url: 'backend/pagseguro.php',
                success: function(r) {
                     console.log(r);
                    PagSeguroLightbox({
                        code: r
                    }, {
                        success: function(transactionCode) {
                            //console.log("Processo concluído!");
                            //login.selecionarContrato(login.$data.contrato_selecionado[0].ID);
                            var codContrato = $(".select_contratos").val();
                            window.location.href = 'index.php?codContrato=' + codContrato;
                        },
                        abort: function() {
                            //console.log("Processo abortado!");
                        }
                    });

                    //window.open('https://pagseguro.uol.com.br/v2/checkout/payment.html?code='+r,'_blank');
                }
            });
        });


        $(".btn-pagar-boleto").click(function() {

            var $btClicado = $(this);
            var nNumero = $btClicado.attr("n_numero");

            if (nNumero == null || nNumero == '') {

                var codBoleto = $btClicado.attr("name");
                var valorBoleto = $btClicado.attr("valor");
                var vencimentoBoleto = $btClicado.attr("vencimento");

                //recalcular valor se boleto estiver vencido
                var valor = valorBoleto.replace(",", "").replace(".", "");
                var quantidade = '1';
                var nome_cliente = $("#txtNomeCliente").val();
                var cpf = $("#txtCpfCnpj").val();
                var telefone = $("#txtDDDFone1").val() + "" + $("#txtTelefone1").val();
                var categoria = $("#txtCategoria").val();
                var email = $("#txtEmail").val();

                var str = vencimentoBoleto.toString();
                var res = str.split("-");
                var vencimento = res[2] + '/' + res[1] + '/' + res[0];

                var firstDate = new Date(res[0], res[1] - 1, res[2]);
                console.log(firstDate);
                if (firstDate < new Date()) {
                    console.log("boleto atrasado");
                    var valorNovo = calcularJuros(valorBoleto, firstDate, codBoleto);
                    valor = valorNovo.replace(",", "").replace(".", "");
                }

                var descricao = 'Boleto';

                //console.log(valor);

                $.ajax({
                    url: "boleto/emitir_boleto.php",
                    data: {
                        descricao: descricao,
                        valor: valor,
                        quantidade: quantidade,
                        nome_cliente: nome_cliente,
                        cpf: cpf,
                        telefone: telefone,
                        vencimento: vencimento,
                        codBoleto: codBoleto,
                        tipoPessoa: categoria,
                        email: email
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(resposta) {

                        var r = resposta;
                        console.log(r);

                        if (resposta.code == 200) {

                            var link = resposta.data.link
                            var url = 'http://172.17.0.71/2via/visualizarBoletoGerencia.php?url=';
                            url += link;
                            var lightbox = lity(url);
                            var ci = resposta.data.charge_id

                            $btClicado.attr("n_numero", link);

                            $.ajax({
                                url: "api.php",
                                data: {
                                    f: '2345423',
                                    cBo: codBoleto,
                                    lk: link,
                                    ci: ci
                                },
                                type: 'post',
                                dataType: 'text',
                                success: function(r) {
                                    console.log(r);
                                }
                            });

                        } else {
                            console.log("ERRO:");
                            console.log(resposta.code);
                        }
                    },

                    error: function(resposta) {
                        //  $("#myModal").modal('hide');
                        alert("Ocorreu um erro - Mensagem: " + resposta.responseText)
                    }
                });

            } else {
                console.log("reimpressão");
                var link = nNumero;
                var url = 'http://179.127.32.7:8989/2via/visualizarBoletoGerencia.php?url=';
                url += link;
                var lightbox = lity(url);
            }
        });
    });


    function calcularJuros(vlr, firstDate, codBoleto) {

        var oneDay = 27 * 60 * 60 * 1000;

        var oneDay = 24 * 60 * 60 * 1000;
        //var partesData = dataVencimento.split("-");
        //var firstDate = new Date(partesData[0], partesData[1] -1, partesData[2]);
        var secondDate = new Date();
        var dias = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));

        if (firstDate < new Date() && dias >= 2) {

            var juros = 0.00;
            var multa = 2.00;

            var jurosTotais = 0.00;

            juros = 0.03333 * dias;

            jurosTotais = juros + multa;

            vlr = vlr.replace(".", "");
            vlr = vlr.replace(",", ".");

            var jurosFinal = parseFloat((vlr * jurosTotais) / 100).toFixed(2);
            console.log("juros final:" + jurosFinal);
            var vlrAtualizado = parseFloat(parseFloat(vlr) + parseFloat(jurosFinal)).toFixed(2);
            var vlrAtualizado2 = String(vlrAtualizado).replace(".", ",");

            //console.log(vlrAtualizado);
            //console.log();

            return vlrAtualizado2;
        } else {
            return vlr;
        }
    }
</script>