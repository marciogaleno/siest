                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Cadastrar Instituição</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="add" method="post">
                                    <div class="box-body">
                                         <input type="hidden" name="id_instituicao" value="<?=$instituicao['id_instituicao']?>"  class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" name="nome" class="form-control" value="<?=$instituicao['nome']?>" id="exampleInputEmail1" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Representante</label>
                                            <input type="text" name="representante" class="form-control" value="<?=$instituicao['representante']?>" id="exampleInputEmail1" placeholder="Representante">
                                        </div>
                                        <div class="form-group">
                                            <label for="cnpj">CNPJ</label>
                                            <input type="text" name="cnpj" value="<?=$instituicao['cnpj']?>" class="form-control" id="cnpj" placeholder="CNPJ">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Endereço</label>
                                            <input type="text" name="endereco" value="<?=$instituicao['endereco']?>" class="form-control" id="exampleInputEmail1" placeholder="Endereço">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">E-mail</label>
                                            <input type="text" name="email" value="<?=$instituicao['email']?>" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefone</label>
                                            <input type="text" name="telefone" value="<?=$instituicao['telefone']?>" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
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