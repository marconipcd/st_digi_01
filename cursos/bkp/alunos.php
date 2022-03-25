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
            <h5 id="alunos" class="card-title">Alunos</h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div <?php if(!isMobile()){ ?> class="col-3" <?php }else{ ?> class="col-12" <?php }?>>
                    <div class="dropdown" style="width: 100%;">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin:0;width: 100%;">

                            <?php
                            if (isset($_REQUEST['fh'])) {
                                echo "Horário: " . $_REQUEST['fh'];
                            } else {
                                echo "Todos os horários";
                            }
                            ?>

                        </button>
                        <div class="dropdown-menu">

                            <a selected href="index.php?u=<?php echo $cliente[0]->ID; ?>#alunos" name="filtro_horario" class="dropdown-item">Todos os horários</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=08:00h as 09:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">08:00h as 09:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=09:00h as 10:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">09:00h as 10:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=10:00h as 11:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">10:00h as 11:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=11:00h as 12:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">11:00h as 12:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=14:00h as 15:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">14:00h as 15:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=15:00h as 16:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">15:00h as 16:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=16:00h as 17:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">16:00h as 17:00h (Segunda a sexta-feira)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=17:00h as 18:00h (Segunda a sexta-feira)#alunos" name="filtro_horario" class="dropdown-item">17:00h as 18:00h (Segunda a sexta-feira)</a>

                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=08:00h as 10:00h (Sábados)#alunos" name="filtro_horario" class="dropdown-item">08:00h as 10:00h (Sábados)</a>
                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&fh=10:00h as 12:00h (Sábados)#alunos" name="filtro_horario" class="dropdown-item">10:00h as 12:00h (Sábados)</a>

                        </div>
                    </div>                
                </div>

                <?php if(!isMobile()){ ?>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <?php } ?>
            </div>

            


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Fone</th>
                            <th>Email</th>
                            <th>Escola</th>
                            <th>Série</th>
                            <th>Horário</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($alunos != null) {
                            foreach ($alunos as $aluno) {
                        ?>
                                <tr>
                                    <td style="white-space:nowrap">
                                        <strong>
                                            <a href="index.php?u=<?php echo $cliente[0]->ID; ?>&a=<?php echo $aluno->ID; ?>">
                                                <?php echo utf8_decode($aluno->NOME); ?>
                                            </a>
                                        </strong>
                                    </td>
                                    <td style="white-space:nowrap"><strong><?php echo calcularIdade($aluno->DATA_NASCIMENTO)." anos"; ?></strong></td>
                                    <td style="white-space:nowrap"><strong><?php echo $aluno->TELEFONE; ?></strong></td>
                                    <td style="white-space:nowrap"><strong><?php echo strtolower($aluno->EMAIL); ?></strong></td>
                                    <td style="white-space:nowrap"><strong><?php echo utf8_decode($aluno->ESCOLA); ?></strong></td>
                                    <td style="white-space:nowrap"><strong><?php echo utf8_decode($aluno->SERIE); ?></strong></td>
                                    <td style="white-space:nowrap"><strong><?php echo utf8_decode($aluno->HORARIO); ?></strong></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
                <span>
                    <?php 
                        if(count($alunos) > 0){
                            echo count($alunos)." encontrados."; 
                        }
                    ?>
                </span>


                <?php
                if ($aluno == null) {
                ?>
                    <div v-if="login.$data.faturas.length == 0" class="alert alert-info">
                        Nenhum aluno cadastrado!
                    </div>
                <?php
                }
                ?>


            </div>
        </div>
    </div>

</body>

</html>