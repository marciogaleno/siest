                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Cadastrar Supervisor Técnico</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="add" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefone</label>
                                            <input type="text" name="telefone" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Instituição</label>
                                            <select class="form-control" name="instituicao_id_instituicao" id="InputNome">
                                                <?php foreach ($instituicoes as $instituicao):?>
                                                    <option value="<?=$instituicao['id_instituicao']?>"><?=$instituicao['nome']?></option>
                                                <?php endforeach;?>
                                            </select>
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