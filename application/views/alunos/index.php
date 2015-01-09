                <!-- Main content -->
                <section class="content">
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listagem alunos</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Matrícula</th>
                                            <th>Nome</th>
                                            <th>Curso</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Ações</th>
                                        </tr>
                                        <?php foreach ($alunos as $aluno):?>
                                        <tr>
                                            <td><?=$aluno['matricula']?></td>
                                            <td><?=$aluno['nome']?></td>
                                            <td><?=$aluno['nome_curso']?></td>
                                            <td><?=$aluno['telefone']?></td>
                                            <td><?=$aluno['email']?></td>
                                            <td><a href="<?=URL?>/alunos/edit/<?=$aluno['id']?>"><span class="label label-primary">Editar</span></a></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            


