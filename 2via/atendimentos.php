<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br />
    <div class="card card-default">
        <div class="card-header">
            <h5 class="card-title">Atendimentos</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Protocolo</th>
                            <th>Data</th>
                            <th>Setor</th>
                            <th>Operador</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($atendimentos != null) {

                            foreach ($atendimentos as $crm) {
                                if ($crm->STATUS == 'EM TRATAMENTO' || $crm->STATUS == 'AGENDADO') {
                        ?>

                                    <tr>
                                        <td><strong><?php echo $crm->ID; ?></strong></td>
                                        <td><strong><?php echo $crm->DATA_AGENDADO; ?></strong></td>
                                        <td><strong><?php echo $crm->SETOR; ?></strong></td>
                                        <td><strong><?php echo $crm->OPERADOR; ?></strong></td>
                                        <td><strong><?php echo $crm->STATUS; ?></strong></td>
                                    </tr>
                                <?php } else { ?>

                                    <tr>
                                        <td><?php echo $crm->ID; ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($crm->DATA_AGENDADO)); ?></td>
                                        <td><?php echo $crm->SETOR; ?></td>
                                        <td><?php echo $crm->OPERADOR; ?></td>
                                        <td><?php echo $crm->STATUS; ?></td>
                                    </tr>

                        <?php }
                            }
                        } ?>


                    </tbody>
                </table>


                <?php
                if ($atendimentos == null) {
                ?>
                    <div v-if="login.$data.faturas.length == 0" class="alert alert-info">
                        Nenhum atendimento encontrado!
                    </div>
                <?php
                }
                ?>


            </div>
        </div>
    </div>

</body>

</html>