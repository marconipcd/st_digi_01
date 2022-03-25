<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <div class="container">



        <!-- FORMULÁRIO EDIÇÃO DE ESCOLA -->
        <?php
        if (isset($_REQUEST['ee'])) {

            $escola_selecionada = buscarEscolaPorCod($_REQUEST['ee']);
        ?>

            <div class="row">
                <div class="col-20" style="width: 100%;">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5 id="escola" class="card-title">Editar</h4>
                        </div>
                        <div class="card-body">


                            <form id="form-novo-cadastro" action="#" method="POST">

                                <input type="hidden" id="txtCodEscola" value="<?php echo $escola_selecionada[0]->ID; ?>">
                                <input type="hidden" id="txtUlg" value="<?php echo $_REQUEST['u']; ?>">

                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="txtNome">Escola:</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txtNome" value="<?php echo $escola_selecionada[0]->NOME; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Manhã</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt89SS">Limite 08:00h às 09:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt89SS" value="<?php echo $escola_selecionada[0]->LIMITE_89_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt910SS">Limite 09:00h às 10:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt910SS" value="<?php echo $escola_selecionada[0]->LIMITE_910_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1011SS">Limite 10:00h às 11:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1011SS" value="<?php echo $escola_selecionada[0]->LIMITE_1011_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1112SS">Limite 11:00h às 12:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1112SS" value="<?php echo $escola_selecionada[0]->LIMITE_1112_SS; ?>" required>
                                        </div>
                                    </div>

                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Tarde</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1415SS">Limite 14:00h às 15:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1415SS" value="<?php echo $escola_selecionada[0]->LIMITE_1415_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1516SS">Limite 15:00h às 16:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1516SS" value="<?php echo $escola_selecionada[0]->LIMITE_1516_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1617SS">Limite 16:00h às 17:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1617SS" value="<?php echo $escola_selecionada[0]->LIMITE_1617_SS; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1718SS">Limite 17:00h às 18:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1718SS" value="<?php echo $escola_selecionada[0]->LIMITE_1718_SS; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Sábado</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt810S">Limite 08:00h às 10:00h (Sábado):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt810S" value="<?php echo $escola_selecionada[0]->LIMITE_810_S; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1012S">Limite 10:00h às 12:00h (Sábado):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1012S" value="<?php echo $escola_selecionada[0]->LIMITE_1012_S; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <a id="btESalvarEscola" class="btn btn-primary btn-large btn-block" href="index.php">Salvar</a>
                                    </div>
                                </div>

                            </form>

                            <script>
                                $("#btESalvarEscola").click(function(e) {
                                    e.preventDefault();


                                    var cod_escola = $("#txtCodEscola").val();
                                    var escola = $("#txtNome").val();

                                    var txt89SS = $("#txt89SS").val();
                                    var txt910SS = $("#txt910SS").val();
                                    var txt1011SS = $("#txt1011SS").val();
                                    var txt1112SS = $("#txt1112SS").val();
                                    var txt1415SS = $("#txt1415SS").val();
                                    var txt1516SS = $("#txt1516SS").val();
                                    var txt1617SS = $("#txt1617SS").val();
                                    var txt1718SS = $("#txt1718SS").val();
                                    var txt810S = $("#txt810S").val();
                                    var txt1012S = $("#txt1012S").val();
                                    var usuario = $("#txtUlg").val();


                                    $.ajax({
                                        url: 'api.php',
                                        type: 'POST',
                                        dataType: 'text',
                                        data: {
                                            editar_escola: true,
                                            cod_escola: cod_escola,
                                            escola: escola,
                                            txt89SS: txt89SS,
                                            txt910SS: txt910SS,
                                            txt1011SS: txt1011SS,
                                            txt1112SS: txt1112SS,
                                            txt1415SS: txt1415SS,
                                            txt1516SS: txt1516SS,
                                            txt1617SS: txt1617SS,
                                            txt1718SS: txt1718SS,
                                            txt810S: txt810S,
                                            txt1012S: txt1012S
                                        }
                                    }).done(function(e) {

                                        //$("#notify-msg").css("display", "block");
                                        alert("Salvo com sucesso!");
                                        window.location.href = 'index.php?p=escolas&u=' + usuario;

                                    }).fail(function(e) {

                                        $("#notify-msg-erro").css("display", "block");

                                    });
                                });
                            </script>




                        </div>
                    </div>
                </div>
            </div>

            <br />

        <?php
        }
        ?>



        <?php
        if (isset($_REQUEST['ce'])) {


        ?>

            <div class="row">
                <div class="col-20" style="width: 100%;">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5 id="escola" class="card-title">Nova escola</h4>
                        </div>
                        <div class="card-body">


                            <form id="form-novo-cadastro" action="#" method="POST">

                                <input type="hidden" id="txtUlg" value="<?php echo $_REQUEST['u']; ?>">

                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="txtNome">Escola:</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txtNome" required>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Manhã</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt89SS">Limite 08:00h às 09:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt89SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt910SS">Limite 09:00h às 10:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt910SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1011SS">Limite 10:00h às 11:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1011SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1112SS">Limite 11:00h às 12:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1112SS" required>
                                        </div>
                                    </div>

                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Tarde</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1415SS">Limite 14:00h às 15:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1415SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1516SS">Limite 15:00h às 16:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1516SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1617SS">Limite 16:00h às 17:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1617SS" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1718SS">Limite 17:00h às 18:00h (Segunda à Sexta-feira):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1718SS" required>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="row">
                                    <div class="col-5">
                                        <h4>Sábado</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt810S">Limite 08:00h às 10:00h (Sábado):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt810S" required>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="txt1012S">Limite 10:00h às 12:00h (Sábado):</label>
                                            <input style="text-align: left;" type="text" class="form-control" id="txt1012S" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <a id="btNSalvarEscola" class="btn btn-primary btn-large btn-block">Salvar</a>
                                    </div>
                                </div>

                            </form>

                            <script>
                                $("#btNSalvarEscola").click(function(e) {
                                    e.preventDefault();
                                    
                                    var escola = $("#txtNome").val();
                                    var txt89SS = $("#txt89SS").val();
                                    var txt910SS = $("#txt910SS").val();
                                    var txt1011SS = $("#txt1011SS").val();
                                    var txt1112SS = $("#txt1112SS").val();
                                    var txt1415SS = $("#txt1415SS").val();
                                    var txt1516SS = $("#txt1516SS").val();
                                    var txt1617SS = $("#txt1617SS").val();
                                    var txt1718SS = $("#txt1718SS").val();
                                    var txt810S = $("#txt810S").val();
                                    var txt1012S = $("#txt1012S").val();
                                    var usuario = $("#txtUlg").val();


                                    $.ajax({
                                        url: 'api.php',
                                        type: 'POST',
                                        dataType: 'text',
                                        data: {
                                            cadastrar_escola: true,                                            
                                            escola: escola,
                                            txt89SS: txt89SS,
                                            txt910SS: txt910SS,
                                            txt1011SS: txt1011SS,
                                            txt1112SS: txt1112SS,
                                            txt1415SS: txt1415SS,
                                            txt1516SS: txt1516SS,
                                            txt1617SS: txt1617SS,
                                            txt1718SS: txt1718SS,
                                            txt810S: txt810S,
                                            txt1012S: txt1012S
                                        }
                                    }).done(function(e) {

                                        //$("#notify-msg").css("display", "block");
                                        alert("Cadastrado com sucesso!");
                                        window.location.href = 'index.php?p=escolas&u=' + usuario;

                                    }).fail(function(e) {

                                        $("#notify-msg-erro").css("display", "block");

                                    });
                                });
                            </script>




                        </div>
                    </div>
                </div>
            </div>

            <br />

        <?php
        }
        ?>


        <div class="row">
            <div class="col-20" style="width: 100%;">

                <div class="card card-default">
                    <div class="card-header">
                        <h5 id="escolas" class="card-title">Escolas cadastradas</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3">
                                <a style="width: 100%;" class="btn btn-primary" href="index.php?p=escolas&ce&u=<?php echo $cliente[0]->ID; ?>">Novo</a>
                            </div>
                        </div>
                        <br />


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nome</th>
                                        <th style="font-size: 0.7em;">08h às 09h</th>
                                        <th style="font-size: 0.7em;">09h às 10h</th>
                                        <th style="font-size: 0.7em;">10h às 11h</th>
                                        <th style="font-size: 0.7em;">11h às 12h</th>
                                        <th style="font-size: 0.7em;">14h às 15h</th>
                                        <th style="font-size: 0.7em;">15h às 16h</th>
                                        <th style="font-size: 0.7em;">16h às 17h</th>
                                        <th style="font-size: 0.7em;">17h às 18h</th>
                                        <th style="font-size: 0.7em;">08h às 10h (Sábado)</th>
                                        <th style="font-size: 0.7em;">10h às 12h (Sábado)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if ($escolas != null) {
                                        foreach ($escolas as $escola) {
                                    ?>
                                            <tr>
                                                <td style="white-space:nowrap"><a href="index.php?p=escolas&u=<?php echo $cliente[0]->ID; ?>&ee=<?php echo $escola->ID; ?>"><?php echo utf8_decode($escola->NOME); ?></a></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_89_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_910_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1011_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1112_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1415_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1516_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1617_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1718_SS); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_810_S); ?></td>
                                                <td style="white-space:nowrap"><?php echo utf8_decode($escola->LIMITE_1012_S); ?></td>

                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <span>
                                <?php
                                if (count($escolas) > 0) {
                                    echo count($escolas) . " encontrados.";
                                }
                                ?>
                            </span>


                            <?php
                            if ($escolas == null) {
                            ?>
                                <div class="alert alert-info">
                                    Nenhuma escola cadastrado!
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>