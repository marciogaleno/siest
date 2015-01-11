                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Aluno</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="edit" method="post">
                                    <div class="box-body">
                      
                                        <input type="hidden" name="id_professor" value="<?=$professor['id_professor']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                      
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" name="nome" value="<?=$professor['nome']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="matricula">Matrícula</label>
                                            <input type="text" value="<?=$professor['matricula']?>" name="matricula" class="form-control" id="matricula" placeholder="Matrícula">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Curso</label>
                                            <select class="form-control" name="curso_id_curso" id="InputNome">
                                                <option value="<?=$professor['id_curso']?>"><?=$professor['nome_curso']?></option>
                                                <?php foreach ($cursos as $curso):?>
                                                    <option value="<?=$curso['id_curso']?>"><?=$curso['nome']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefone">Telelefone</label>
                                            <input type="text" value="<?=$professor['telefone']?>"  name="telefone" class="form-control" id="telefone" placeholder="Telefone">
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