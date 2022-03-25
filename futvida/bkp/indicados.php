<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div v-if="mostrarFormIndicacao" class="card card-default" style="margin: 20px;">
        <div class="card-header" style="color: #009fe1;  font-weight: bold;">Informe aqui os dados da pessoa que você quer indicar.</div>
        <div class="card-body">
            <form>

                <div class="form-group row">
                    <label for="txtNome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; width: 100%;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtNome" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtCpf" class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; width: 180px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtCpf" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtDDD" class="col-sm-2 col-form-label">Telefone 1</label>
                    <div class="col-sm-10">
                        <div class="row" style="margin-left:0;">
                            <input style="text-align: left; width: 35px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtDDD" value="">
                            <input style="text-align: left; width: 200px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtTelefone" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtDDD2" class="col-sm-2 col-form-label">Telefone 2</label>
                    <div class="col-sm-10">
                        <div class="row" style="margin-left:0;">
                            <input style="text-align: left; width: 35px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtDDD2" value="">
                            <input style="text-align: left; width: 200px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtTelefone2" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtRua" class="col-sm-2 col-form-label">Rua</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; width: 100%; border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtRua" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtNumero" class="col-sm-2 col-form-label">Numero</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; width: 40px;border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtNumero" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtBairro" class="col-sm-2 col-form-label">Bairro</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtBairro" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtCidade" class="col-sm-2 col-form-label">Cidade</label>
                    <div class="col-sm-10">
                        <input style="text-align: left; border: 1px solid #c3c3c3;" type="text" class="form-control-plaintext" id="txtCidade" value="">
                    </div>
                </div>

            </form>
        </div>

        <div class="row">
            <button style="width: 157px; margin: 12px;float: left; background: #7b878c;" type="submit" class="btn btn-secondary btn-large btn-block btn-voltar" href="#">Voltar</button>
            <button style="width: 157px; margin: 12px; float: left;" type="submit" class="btn btn-primary btn-large btn-block btn-enviar-indicacao" href="#">Enviar</button>
        </div>

        <div style="clear:both;" />
    </div>
</body>

</html>



<input id="txtCodCliente" value="<?php echo $cliente[0]->ID; ?>" style="display:none;" />

<script>
    $(document).ready(function() {

        $(".btn-voltar").click(function(e) {
            e.preventDefault();
            window.history.back();
        });

        $(".btn-enviar-indicacao").click(function(e) {
            e.preventDefault();

            var nome = $("#txtNome").val();
            var cpf = $("#txtCpf").val();
            var ddd = $("#txtDDD").val();
            var telefone = $("#txtTelefone").val();
            var ddd2 = $("#txtDDD2").val();
            var telefone2 = $("#txtTelefone2").val();
            var rua = $("#txtRua").val();
            var numero = $("#txtNumero").val();
            var bairro = $("#txtBairro").val();
            var cidade = $("#txtCidade").val();
            var codCliente = $("#txtCodCliente").val();

            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {
                    enviarIndicacao: true,
                    nome: nome,
                    cpf: cpf,
                    rua: rua,
                    numero: numero,
                    bairro: bairro,
                    cidade: cidade,
                    ddd: ddd,
                    telefone: telefone,
                    ddd2: ddd2,
                    telefone2: telefone2,
                    codCliente: codCliente
                },
                url: 'backend/api.php',
                success: function(r) {

                    window.history.back();
                    //console.log('indicado salvo!');

                    //$(document).animate({
                    //    scrollTop: $('#indicacoes').scrollTop()
                    //}, 500);
                },

                error: function(resposta) {

                    if (resposta.responseText == 'OK') {
                        window.history.back();
                    }

                }

            });
        });
    });
</script>