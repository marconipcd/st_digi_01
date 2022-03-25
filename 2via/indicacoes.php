<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br/>
    <div id="indicacoes" class="card card-default ">
        <div class="card-header">Minhas Indicações</div>
        <div class="card-body">

           <!-- <div v-if="mostrarConfirmacaoEnviado" class="alert alert-success" role="alert">
                <strong>Indicação Enviada com Sucesso!</strong> porfavor aguarde o processo de análise.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Status</th>
                            <th>Data Envio</th>

                        </tr>
                    </thead>
                    <tbody>


                            <?php
                            if($indicacoes != null){
                                foreach ($indicacoes as $indicacao) {                                            
                            ?>

                        <tr style="color: #009fe1;">
                            <td><?php echo $indicacao->NOME_RAZAO; ?></td>
                            <td><?php echo $indicacao->DOC_CPF_CNPJ; ?></td>
                            <td><?php echo $indicacao->STATUS_2; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($indicacao->DATA_CADASTRO)); ?></td>
                            
                        </tr>

                            <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
    <br/>
    <button style="margin: 0;" type="submit" class="btn btn-primary btn-large btn-block btn-quero-indicar" href="#">QUERO INDICAR UM AMIGO</button>

</body>

</html>