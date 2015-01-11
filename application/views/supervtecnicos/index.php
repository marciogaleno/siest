<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listagem de Instituições</h3>
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
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Instituicao</th>
                            <th colspan="3">Ações</th>
                        </tr>
                        <?php foreach ($superv_tecnicos as $superv_tecnico): ?>
                            <tr>
                                <td><?=$superv_tecnico['nome'] ?></td>
                                <td><?=$superv_tecnico['telefone'] ?></td>
                                <td><?=$superv_tecnico['nome_instituicao'] ?></td>
                                <td><a href="<?= URL ?>supervtecnicos/edit/<?= $superv_tecnico['id'] ?>" class="label label-primary">Editar</a></td>
                                <td><a href="<?= URL ?>supervtecnicos/view/<?= $superv_tecnico['id'] ?>" class="label label-info">Visualizar</a></td>
                                <td><a href="<?= URL ?>supervtecnicos/delete/<?= $superv_tecnico['id'] ?>" class="label label-danger delete">Deletar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include 'application/views/elements/deletemodal.php'; ?>