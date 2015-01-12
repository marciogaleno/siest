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
                                <form role="form" action="add" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Aluno</label>
                                            <input type="text" name="aluno" data-provide="typeahead" id="aluno" onkeyup="autocomplet()" class="form-control"  placeholder="Digite o nome ou matrícula do aluno">
                                            <input type="hidden" name="aluno_id" id="aluno_id" class="form-control" id="exampleInputEmail1" placeholder="Área">
                                            <div id="aluno_list" class="list-group"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Área</label>
                                            <input type="nome" name="area" class="form-control" id="exampleInputEmail1" placeholder="Área">
                                        </div>
                                        <label for="exampleInputEmail1">Visto coordenador</label>
                                        <div class="checkbox">                                      
                                            <input type="checkbox" value="1" name="visto_coord">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Título</label>
                                            <input type="" name="titulo" class="form-control" id="exampleInputEmail1" placeholder="Título">
                                        </div>
                                       <div class="form-group">
                                            <label for="professor">Supervisor Professor</label>
                                            <input type="text" name="professor_nome_matricula" data-provide="typeahead" id="professor" onkeyup="autocomplet_professor()" class="form-control"  placeholder="Digite o nome ou matrícula do aluno">
                                            <input type="hidden" name="professor_id" id="professor_id" class="form-control" >
                                            <div id="professor_list" class="list-group"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="superv_tecnico">Supervidor técnico</label>
                                            <input type="text" name=superv_tecnico_nome" id="superv_tecnico" onkeyup="autocomplet_superv_tec()" class="form-control"  placeholder="Digite o nome do supervisor técncio ou instituição">
                                            <input type="hidden" name="superv_tecnico_id" id="superv_tecnico_id" class="form-control"  placeholder="Área">
                                            <div id="superv_tecnico_list" class="list-group"></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data início</label>
                                            <input type="date" name="data_inicio" class="form-control" id="exampleInputEmail1" placeholder="Data início">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data fim</label>
                                            <input type="date" name="data_fim" class="form-control" id="exampleInputEmail1" placeholder="Data fim">
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
                    $('#professor_list').hide();
            }
       }
       
        function autocomplet_superv_tec() {
            var min_length = 0; // min caracters to display the autocomplete
            var superv_tecnico = $('#superv_tecnico').val();
            if (superv_tecnico.length >= min_length) {
                    $.ajax({
                            url: '<?=URL?>supervtecnicos/searchAjax',
                            type: 'POST',
                            data: {superv_tecnico_nome:superv_tecnico},
                            success:function(data){
                                    $('#superv_tecnico_list').show();                                 
                                    $('#superv_tecnico_list').html(data);
                            }
                    });
            } else {
                    $('#superv_tecnico_list').hide();
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
                
                console.log(item_id);
                //setando id do professor
                $('#professor_id').val(item_id);

        }
        
        // set_item : this function will be executed when we select an item
        function set_item_superv_tec(item, item_id) {
                // change input value
                $('#superv_tecnico').val(item);
                // hide proposition list
                $('#superv_tecnico_list').hide();

                //setando id do professor
                $('#superv_tecnico_id').val(item_id);

        }
            
            
</script>
