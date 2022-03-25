<?php

    if(isset($_REQUEST['txtCpfTitularContrato']) && 
    isset($_REQUEST['txtNomeTitularContrato']) && 
    isset($_REQUEST['txtCpfAluno']) && 
    isset($_REQUEST['txtNomeAluno']) && 
    isset($_REQUEST['txtDataNascimento']) && 
    isset($_REQUEST['txtEndereco']) && 
    isset($_REQUEST['txtBairro']) && 
    isset($_REQUEST['txtCidade']) && 
    isset($_REQUEST['txtFone']) && 
    isset($_REQUEST['txtEmail']) &&     
    isset($_REQUEST['cbHorario']) ){
        


        require_once 'api.php';

        cadastrarCliente(
            $_REQUEST['txtCpfTitularContrato'],
            $_REQUEST['txtNomeTitularContrato'],
            $_REQUEST['txtCpfAluno'],
            $_REQUEST['txtNomeAluno'],
            $_REQUEST['txtDataNascimento'], 
            $_REQUEST['txtEndereco'],
            $_REQUEST['txtBairro'],
            $_REQUEST['txtCidade'],
            $_REQUEST['txtFone'],
            $_REQUEST['txtEmail'],
            $_REQUEST['cbHorario']);

            


    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br />

    <div style="width:100%;">



        <div class="card card-default">
            <div class="card-header">
                <h5 class="card-title">
                    Cadastro                         
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form name="formCadastro" id="formCadastro" action="#" method="GET">

                        <div class="card-header">
                            <h7 class="card-title">
                                Dados do titular
                            </h7>
                        </div>
                        <br>
                     
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtCpfTitularContrato">CPF Titular do contrato:</label>
                                        <input required onchange="buscarTitular('#txtNomeTitularContrato')" id="txtCpfTitularContrato" name="txtCpfTitularContrato" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="txtNomeTitularContrato">Nome titular do contrato:</label>
                                        <input required id="txtNomeTitularContrato" name="txtNomeTitularContrato" class="form-control" type="text">                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function buscarTitular(inputNome){
                                
                                var cpf = $("#txtCpfTitularContrato").val();                                

                                if(String($("#txtCpfTitularContrato").val()).length == 11){


                                    $.ajax({
                                        url: 'api.php',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            procurar_cliente_cpf: true,
                                            cpf: cpf                                       
                                        },
                                        success: function (r){
                                            if(r != null){
                                                $(inputNome).val(r[0].NOME_RAZAO);
                                            }
                                        }
                                    });                                
                                    
                                }
                            }
                            function buscarAluno(){
                                
                                var cpf = $("#txtCpfAluno").val();                                

                                if(String($("#txtCpfAluno").val()).length == 11){


                                    $.ajax({
                                        url: 'api.php',
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            procurar_cliente_cpf: true,
                                            cpf: cpf                                       
                                        },
                                        success: function (r){
                                            if(r != null){
                                                $("#txtNomeAluno").val(r[0].NOME_RAZAO);
                                                $("#txtDataNascimento").val(r[0].DATA_NASCIMENTO);
                                                $("#txtEndereco").val(r[0].ENDERECO);
                                                $("#txtBairro").val(r[0].BAIRRO);
                                                $("#txtCidade").val(r[0].CIDADE);
                                                $("#txtFone").val(r[0].TELEFONE1);
                                                $("#txtEmail").val(r[0].EMAIL);
                                                $("#txtCodCadastroExistente").val(r[0].ID);
                                            }
                                        }
                                    });                                
                                    
                                }
                            }


                            
                        </script>


                        <br>
                        <div class="card-header">
                            <h7 class="card-title">
                                Dados do aluno
                            </h7>
                        </div>
                        <br>

                        <input type="hidden" id="txtCodCadastroExistente" >

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtCpfAluno">CPF Aluno:</label>
                                        <input required onchange="buscarAluno()" id="txtCpfAluno" name="txtCpfAluno" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="txtNomeAluno">Nome Aluno:</label>
                                        <input required id="txtNomeAluno" name="txtNomeAluno" class="form-control" type="text">                                        
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="txtDataNascimento">Data nascimento:</label>
                                        <input required id="txtDataNascimento" name="txtDataNascimento" class="form-control" type="date">                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="txtEndereco">Endereço:</label>
                                        <input required id="txtEndereco" name="txtEndereco" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtBairro">Bairro:</label>
                                        <input required id="txtBairro" name="txtBairro" class="form-control" type="text">                                        
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="txtCidade">Cidade:</label>
                                        <input required id="txtCidade" name="txtCidade" class="form-control" type="text">                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtFone">Fone:</label>
                                        <input required id="txtFone" name="txtFone" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtEmail">Email:</label>
                                        <input id="txtEmail" name="txtEmail" class="form-control" type="text">                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <br>
                        <div class="card-header">
                            <h7 class="card-title">
                                Dados do curso
                            </h7>
                        </div>
                        <br>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="txtCurso">Curso:</label>
                                        <input required id="txtCurso" name="txtCurso" class="form-control" type="text" value="INFORMÁTICA BÁSICA" disabled>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="cbHorario">Horário:</label>
                                        <select class="form-control" id="cbHorario" name="cbHorario" required>
                                                <option></option>
                                                <option>08:00h as 09:00h (Segunda a sexta-feira)</option>
                                                <option>09:00h as 10:00h (Segunda a sexta-feira)</option>
                                                <option>10:00h as 11:00h (Segunda a sexta-feira)</option>
                                                <option>11:00h as 12:00h (Segunda a sexta-feira)</option>
                                                <option>14:00h as 15:00h (Segunda a sexta-feira)</option>
                                                <option>15:00h as 16:00h (Segunda a sexta-feira)</option>
                                                <option>16:00h as 17:00h (Segunda a sexta-feira)</option>
                                                <option>17:00h as 18:00h (Segunda a sexta-feira)</option>

                                                <option>08:00h as 10:00h (Sábados)</option>
                                                <option>10:00h as 12:00h (Sábados)</option>
                                        </select>                                       
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="notify-msg" class="alert alert-success" style="display:none;">
                            <strong>Sucesso!</strong> Aluno cadastrado.
                        </div>

                        <div id="notify-msg-erro" class="alert alert-danger" style="display:none;">
                            <strong>Erro!</strong> Não foi possível enviar seu cadastro no momento.
                        </div>

                        <button style="margin:0;" type="submit" class="btn btn-primary">Cadastrar</button>                     

                        <br>


                    </form>



                </div>
            </div>
        </div>

        <br />
    </div>
</body>

</html>

<br/>
<br/>
<br/>