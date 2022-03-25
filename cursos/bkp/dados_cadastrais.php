<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Dados Cadastrais</h4>

        </div>
        <div class="card-body">

            <div class="row">
                <label style="font-weight: bold;" class="col-sm-2">CPF/CNPJ:</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo  esconderCPF($cliente[0]->DOC_CPF_CNPJ); ?></p>
                    <input class="txtCpf" value="<?php echo $cliente[0]->DOC_CPF_CNPJ; ?>" style="display:none;" />
                </div>
            </div>

            <div class="row">
                <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Nome:</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo esconderNome($cliente[0]->NOME_RAZAO); ?></p>
                </div>
            </div>

            <div class="row">
                <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Telefone:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">(<?php echo $cliente[0]->DDD_FONE1; ?>) <?php echo esconderTelefone($cliente[0]->TELEFONE1); ?></p>
                </div>
            </div>

            <div class="row">
                <label style="font-weight:bold;" class="control-label col-sm-2" for="email">E-mail:</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo esconderEmail($cliente[0]->EMAIL); ?></p>
                </div>
            </div>
        </div>


    </div>
    <br />

    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title"><strong>DESCONTO EM EMPRESAS HABILITADOS PRA VOCÊ</strong></h4>
        </div>
        <div class="card-body">
            <img src="images/logo-parceiro.png" alt="" srcset="">   
            <img src="images/logo-parceiro2.png" alt="" srcset="">   
            <img src="images/logo-parceiro3.png" alt="" srcset="">   
            <img src="images/logo-parceiro4.png" alt="" srcset="">  
        </div>
    </div>
    <br/>

    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Dados do Contrato</h4>
        </div>
        <div class="card-body">


            <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Contrato:</label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <select class="select_contratos form-control" style="font-weight: bold;padding: 4px 0px;padding: 4px 0px;width:100%;">

                        <?php
                        foreach ($contratos as $contrato) {
                            if ($contrato->ID == $contrato_selecionado[0]->ID) {
                        ?>
                                <option selected value="<?php echo $contrato->ID; ?>"><?php echo $contrato->ID; ?> - <?php echo $contrato->NOME; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $contrato->ID; ?>"><?php echo $contrato->ID; ?> - <?php echo $contrato->NOME; ?></option>

                        <?php
                            }
                        }
                        ?>
                    </select>
                </p>
            </div>



            <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Endereço:</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $contrato_selecionado[0]->CEP . " " . $contrato_selecionado[0]->ENDERECO . " " . $contrato_selecionado[0]->BAIRRO . " " . $contrato_selecionado[0]->NUMERO . " " . $contrato_selecionado[0]->CIDADE; ?></p>
            </div>



            <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Tipo:</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $contrato_selecionado[0]->CONTRATO ?></p>
            </div>




            <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Data Instalação:</label>
            <div class="col-sm-10">
                <p class="form-control-static"><?php echo $contrato_selecionado[0]->DATA_INSTALACAO; ?></p>
            </div>



            <label style="font-weight: bold;" class="control-label col-sm-2" for="email">Status:</label>
            <div class="col-sm-10">
                <p class="form-control-static">

                    <?php
                    if ($contrato_selecionado != null && $contrato_selecionado[0]->STATUS_2 == 'BLOQUEADO') {
                    ?>
                        <strong class="bloqueado"><?php echo $contrato_selecionado[0]->STATUS_2; ?></strong>
                    <?php
                    } else {
                    ?>
                        <strong><?php echo $contrato_selecionado[0]->STATUS_2; ?></strong>
                    <?php
                    }
                    ?>
                </p>
            </div>



        </div>
    </div>
</body>

</html>