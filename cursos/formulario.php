


<div style="width:100%;">
    <div style="border: none;" class="card card-default">
        
        <div class="card-body">
            <div class="table-responsive">
                <form name="formCadastro" id="formCadastro">

                    <input type="hidden" id="txtCodClienteExistente" name="txtCodClienteExistente" value="0" />
               
                    <div style="width: 100%; text-align: center;">
                        <strong>Próxima turma: 03/05/2021</strong><br/>
                    </div>
               

                    <input type="hidden" id="txtCodCadastroExistente">

                    <div class="container-fluid">

                        <div class="web">
                        
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtCpfAluno">CPF Aluno:</label>
                                        <input required onchange="buscarAluno()" id="txtCpfAluno" name="txtCpfAluno" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="txtNomeAluno">Nome Aluno:</label>
                                        <input onkeyup="this.value = this.value.toUpperCase();" required id="txtNomeAluno" name="txtNomeAluno" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="txtDataNascimento">Data nascimento:</label>
                                        <input required id="txtDataNascimento" name="txtDataNascimento" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="txtEndereco">Endereço:</label>
                                        <input onkeyup="this.value = this.value.toUpperCase();" required id="txtEndereco" name="txtEndereco" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="txtNumero">Número:</label>
                                        <input required id="txtNumero" name="txtNumero" class="form-control" type="number">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="txtBairro">Bairro:</label>
                                        <input onkeyup="this.value = this.value.toUpperCase();" required id="txtBairro" name="txtBairro" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="txtCidade">Cidade:</label>
                                        <input onkeyup="this.value = this.value.toUpperCase();" required id="txtCidade" name="txtCidade" class="form-control" type="text">
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
                                        <input onkeyup="this.value = this.value.toUpperCase();" id="txtEmail" name="txtEmail" class="form-control" type="text">
                                    </div>
                                </div>

                            </div>
                        </div>

                       

                        <div class="mobile">
                            <div>
                                <div class="form-group">
                                    <label for="txtCpfAluno">CPF Aluno:</label>
                                    <input required onkeyup="buscarAluno()" id="txtCpfAluno" name="txtCpfAluno" class="form-control" type="number">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="txtNomeAluno">Nome Aluno:</label>
                                    <input onkeyup="this.value = this.value.toUpperCase();" required id="txtNomeAluno" name="txtNomeAluno" class="form-control" type="text">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="txtDataNascimento">Data nascimento:</label>
                                    <input required id="txtDataNascimento" name="txtDataNascimento" class="form-control" type="date">
                                </div>
                            </div>
                        
                            <div>
                                <div class="form-group">
                                    <label for="txtEndereco">Endereço:</label>
                                    <input onkeyup="this.value = this.value.toUpperCase();" required id="txtEndereco" name="txtEndereco" class="form-control" type="text">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="txtNumero">Número:</label>
                                    <input required id="txtNumero" name="txtNumero" class="form-control" type="number">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="txtBairro">Bairro:</label>
                                    <input onkeyup="this.value = this.value.toUpperCase();" required id="txtBairro" name="txtBairro" class="form-control" type="text">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="txtCidade">Cidade:</label>
                                    <input onkeyup="this.value = this.value.toUpperCase();" required id="txtCidade" name="txtCidade" class="form-control" type="text">
                                </div>
                            </div>
                     

                       
                            <div>
                                <div class="form-group">
                                    <label for="txtFone">Fone:</label>
                                    <input required id="txtFone" name="txtFone" class="form-control" type="number">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="txtEmail">Email:</label>
                                    <input onkeyup="this.value = this.value.toUpperCase();" id="txtEmail" name="txtEmail" class="form-control" type="text">
                                </div>
                            </div>


                        
                        </div>




                        
                    </div>

                    <br>
                   

                    <div class="container-fluid">

                        <div class="web">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="txtCurso">Curso:</label>

                                        <select class="form-control" id="txtCurso" name="txtCurso" required>
                                            <option selected>INTERNET PARA INICIANTES</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="cbHorario">Horário:</label>
                                        <select class="form-control" id="cbHorario" name="cbHorario" required>
                                            <option></option>

                                            <option>09:00h as 10:00h (Segunda a sexta-feira)</option>
                                            <option>10:00h as 11:00h (Segunda a sexta-feira)</option>
                                            <option>11:00h as 12:00h (Segunda a sexta-feira)</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mobile">
                        
                            <div>
                                <div class="form-group">
                                    <label for="txtCurso">Curso:</label>

                                    <select class="form-control" id="txtCurso" name="txtCurso" required>
                                        <option selected>INTERNET PARA INICIANTES</option>
                                    </select>

                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="cbHorario">Horário:</label>
                                    <select class="form-control" id="cbHorario" name="cbHorario" required>
                                        <option></option>

                                        <option>09:00h as 10:00h (Segunda a sexta-feira)</option>
                                        <option>10:00h as 11:00h (Segunda a sexta-feira)</option>
                                        <option>11:00h as 12:00h (Segunda a sexta-feira)</option>

                                    </select>
                                </div>
                            </div>
                        
                        </div>
                        
                    </div>




                    <div id="aviso-sucesso" class="alert alert-success" role="alert" style="display:none;">
                        Cadastro enviado com sucesso!
                    </div>

                    <div id="aviso-falha" class="alert alert-danger" role="alert" style="display:none;">
                        Todos os campos precisam ser preenchidos!
                    </div>


                    <div style="width: 100%; text-align: center;">
                        
                        <button id="btEnviar" style="margin:0;" type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>

                    <br>


                </form>



            </div>
        </div>
    </div>

    <br />
</div>