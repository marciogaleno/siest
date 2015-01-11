                <!-- Main content -->
                <section class="content">
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listagem de estagios</h3>
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
                                            <th>Matrícula Aluno</th>
                                            <th>Aluno</th> 
                                            <th>Área</th>
                                            <th>Supervisor professor</th>
                                            <th>Supervisor Técnico</th>
                                            <th>Instituição</th>
                                            <th>Data início</th>
                                            <th>Data fim</th>
                                                                                      
                                        </tr>
                                        <?php foreach ($estagios as $estagio):?>
                                        <tr>
                                            <td><?=$estagio['matricula_aluno']?></td>
                                            <td><?=$estagio['nome_aluno']?></td>
                                            <td><?=$estagio['area']?></td>
                                            <td><?=$estagio['nome_professor']?></td>
                                            <td><?=$estagio['nome_supervisor_tecnico']?></td>
                                            <td><?=$estagio['nome_instituicao']?></td>
                                            <td><?=$estagio['data_inicio']?></td>
                                            <td><?=$estagio['data_fim']?></td>
                                            <td><a href="<?=URL?>estagios/edit/<?=$estagio['id_estagio']?>"><span class="label label-primary">Editar</span></a></td>
                                            <td><a href="<?=URL?>estagios/view/<?=$estagio['id_estagio']?>"><span class="label label-success">Visualizar</span></a></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->