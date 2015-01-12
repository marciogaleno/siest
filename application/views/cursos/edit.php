                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar curso</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="edit" method="post">
                                    <div class="box-body">
                                            <input type="hidden" name="id_curso" value="<?=$curso['id_curso']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" name="nome" value="<?=$curso['nome']?>" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                                        </div>  
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Curso</label>            
                                            <select class="form-control" name="coord_estagio_id" id="InputNome">
                                                    <option value="<?=$curso['id_professor']?>"><?=$curso['nome_professor']?></option>
                                                <?php foreach ($professores as $professor):?>
                                                    <option value="<?=$professor['id_professor']?>"><?=$professor['nome']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Categoria</label>
                                            <input type="telefone" value="<?=$curso['categoria']?>" name="categoria" class="form-control" id="exampleInputEmail1" placeholder="Categoria">
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