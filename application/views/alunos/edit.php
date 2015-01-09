                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Cadastrar Aluno</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="edit" method="post">
                                    <div class="box-body">
                      
                                        <input type="hidden" name="id" value="<?=$aluno['id']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                      
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" name="nome" value="<?=$aluno['nome']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Matrícula</label>
                                            <input type="text" value="<?=$aluno['matricula']?>" name="matricula" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Curso</label>
                                            <select class="form-control" name="curso_id_curso" id="InputNome">
                                                <option value="<?=$aluno['id_curso']?>"><?=$aluno['nome_curso']?></option>
                                                <?php foreach ($cursos as $curso):?>
                                                    <option value="<?=$curso['id_curso']?>"><?=$curso['nome']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telelefone</label>
                                            <input type="text" value="<?=$aluno['telefone']?>"  name="telefone" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E-mail</label>
                                            <input type="text" value="<?=$aluno['email']?>" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CPF</label>
                                            <input type="text" value="<?=$aluno['cpf']?>" name="cpf" class="form-control" id="exampleInputEmail1" placeholder="CPF">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">RG</label>
                                            <input type="text" value="<?=$aluno['rg']?>" name="rg" class="form-control" id="exampleInputEmail1" placeholder="RG">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data nascimento</label>
                                            <input type="text" value="<?=$aluno['dat_nasc']?>" name="dat_nasc" class="form-control" id="exampleInputEmail1" placeholder="Data nascimento">
                                        </div>
           
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->