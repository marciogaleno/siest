<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar usuário</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="add" method="post">
                    <div class="box-body">
                            <input type="hidden" value="<?=$usuario['id']?>" name="id" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" value="<?=$usuario['nome']?>" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" name="email"  value="<?=$usuario['email']?>" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Senha</label>
                            <input type="password" name="senha" class="form-control" id="exampleInputEmail1" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipo usuário</label>
                            <input type="text" name="tipo_user"  value="<?=$usuario['tipo_user']?>" class="form-control" id="exampleInputEmail1" placeholder="Categoria">
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