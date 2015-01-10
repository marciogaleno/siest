<!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Cadastrar Estágio</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Aluno</label>
                                            <input type="text" name="aluno" data-provide="typeahead" id="aluno" onkeyup="autocomplet()" class="form-control"  placeholder="Digite o nome ou matrícula para busca o aluno">
                                            <input type="hidden" name="aluno_id" id="aluno_id" class="form-control" id="exampleInputEmail1" placeholder="Área">
                                            <ul id="aluno_list" class="list-group"></ul>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Área</label>
                                            <input type="nome" name="area" class="form-control" id="exampleInputEmail1" placeholder="Área">
                                        </div>
                                        <label for="exampleInputEmail1">Visto coordenador</label>
                                        <div class="checkbox">                                      
                                            <input type="checkbox" name="visto_coord">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Título</label>
                                            <input type="" name="titulo" class="form-control" id="exampleInputEmail1" placeholder="Título">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supervidor professor</label>
                                            <input type="text" name="professor_nome_matricula" data-provide="typeahead" id="professor" onkeyup="autocomplet_professor()" class="form-control"  placeholder="Digite o nome ou matrícula para busca o professor">
                                            <input type="hidden" name="professor_id" id="professor_id" class="form-control" id="exampleInputEmail1" placeholder="Área">
                                            <ul id="professor_list" class="list-group"></ul>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Supervisor técnico</label>
                                            <select class="form-control" name="id_superv">
                                                <option>--</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data início</label>
                                            <input type="telefone" name="data_inicio" class="form-control" id="exampleInputEmail1" placeholder="Data início">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data fim</label>
                                            <input type="telefone" name="data_fim" class="form-control" id="exampleInputEmail1" placeholder="Data fim<">
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
            
<script>
            // autocomplet : this function will be executed every time we change the text
        function autocomplet() {
            var min_length = 0; // min caracters to display the autocomplete
            var aluno = $('#aluno').val();
            if (aluno.length >= min_length) {
                    $.ajax({
                            url: '<?=URL?>alunos/searchAjax',
                            type: 'POST',
                            data: {aluno:aluno},
                            success:function(data){
                                    $('#aluno_list').show();
                                    $('#aluno_list').html(data);
                            }
                    });
            } else {
                    $('#aluno_list').hide();
            }
       }
        function autocomplet_professor() {
            var min_length = 0; // min caracters to display the autocomplete
            var professor = $('#professor').val();
            if (professor.length >= min_length) {
                    $.ajax({
                            url: '<?=URL?>professores/searchAjax',
                            type: 'POST',
                            data: {professor_nome_matricula:professor},
                            success:function(data){
                                    $('#professor_list').show();
                                    
                                    $('#professor_list').html(data);
                            }
                    });
            } else {
                    $('#aluno_list').hide();
            }
       }

        // set_item : this function will be executed when we select an item
        function set_item_aluno(item, item_id) {
                // change input value
                $('#aluno').val(item);
                // hide proposition list
                $('#aluno_list').hide();

                //setando id do professor
                $('#aluno_id').val(item_id);

        }
        // set_item : this function will be executed when we select an item
        function set_item_professor(item, item_id) {
                // change input value
                $('#professor').val(item);
                // hide proposition list
                $('#professor_list').hide();

                //setando id do professor
                $('#professor_id').val(item_id);

        }
            
            
</script>
