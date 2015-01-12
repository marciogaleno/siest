<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Informações de estágio</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <fieldset>
                        <legend>Aluno</legend>
                        <label>Nome:&nbsp;</label><?= $estagio['nome_aluno'] ?><br>
                        <label>Matrícula:&nbsp;</label><?= $estagio['matricula_aluno'] ?><br>
                        <label>Telefone:&nbsp;</label><?= $estagio['telefone_aluno'] ?><br>
                        <label>Curso:&nbsp;</label><?= $estagio['nome_curso'] ?><br>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Supervisor Professor</legend>
                        <label>Nome:&nbsp;</label><?= $estagio['nome_professor'] ?><br>
                        <label>Matrícula:&nbsp;</label><?= $estagio['matricula_professor'] ?><br>
                        <label>Telefone:&nbsp;</label><?= $estagio['telefone_professor'] ?><br>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Supervidor Técnico</legend>
                        <label>Nome:&nbsp;</label><?= $estagio['nome_supervisor_tecnico'] ?><br>
                        <label>Telefone: &nbsp;</label><?= $estagio['telefone_supervisor_tecnico'] ?><br>
                    </fieldset>
                </div>

            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary col-md-6">
                <div class="box-header">
                    <h3 class="box-title">Visitas</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div class="box-body table-responsive no-padding">                  
                    <table id="users" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Resumo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if (!empty($visitas)):
                                    foreach ($visitas as $visita):
                            ?>
                                        <tr>
                                            <td><?php echo date_format( new DateTime($visita['data']), "d/m/Y")?></td>
                                            <td><?=$visita['horario']?></td>
                                            <td><?=$visita['resumo']?></td>
                                            <td><a href="<?=URL?>visitas/delete/<?=$visita['id']?>/<?=$estagio['id_estagio']?>" class="label label-danger delete">Deletar</a></td>
                                        </tr>
                            <?php
                                    endforeach;
                                endif;  
                            ?>
                        </tbody>
                    </table>
                    <button id="create-user" class="btn btn-success">Adicionar</button>
                    <div id="dialog-form" title="Adicionar visita">
                        <p class="validateTips">All form fields are required.</p>

                        <form>
                            <fieldset>                               
                                <!-- Date mm/dd/yyyy -->
                                <div class="form-group">
                                    <label for="data">Data</label>
                                    <div class="input-group">
                                        <input type="date" name="data" id="data" class="form-control pull-right" id="reservation"/>
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                                <div class="form-group">
                                    <label for="horario">Horario</label>                               
                                    <input type="time" name="horario" id="horario" value="21:25:03" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="resumo">Resumo</label>
                                    <textarea name="resumo" id="resumo" class="form-control" >resumo</textarea>
                                </div>
                                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                            </fieldset>
                        </form>
                    </div>


                </div>       
            </div><!-- /.box -->

        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
</aside><!-- /.right-side -->

<?php include 'application/views/elements/deletemodal.php';?>

<script type="text/javascript">
    $(function () {
        var dialog, form,
                // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                data = $("#data"),
                horario = $("#horario"),
                resumo = $("#resumo"),
                estagio_id = <?php echo "'" . $estagio['id_estagio'] . "'" ?>,
                allFields = $([]).add(data).add(horario).add(resumo),
                tips = $(".validateTips");

        //saveVisita();
        function updateTips(t) {
            tips
                    .text(t)
                    .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) {
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Length of " + n + " must be between " +
                        min + " and " + max + ".");
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!(regexp.test(o.val()))) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function addVisita() {
            var valid = true;
            allFields.removeClass("ui-state-error");

//            valid = valid && checkLength(data, "username", 3, 16);
//            valid = valid && checkLength(email, "email", 6, 80);
//            valid = valid && checkLength(password, "password", 5, 16);
//
//            valid = valid && checkRegexp(data, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");
//            valid = valid && checkRegexp(email, emailRegex, "eg. ui@jquery.com");
//            valid = valid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");

            valid = true;
            saveVisita();
            console.log('aqui')
            if (valid) {
                $("#users tbody").append("<tr>" +
                        "<td>" + $.datepicker.formatDate('dd/mm/yy', new Date(data.val()))+ "</td>" +
                        "<td>" + horario.val() + "</td>" +
                        "<td>" + resumo.val() + "</td>" +
                        '<td><a href="' + <?php echo '"'. URL . '"'?> + 'visitas/delete/' + <?php echo "{$visita['id']}"?> + '/' + <?php echo "{$estagio['id_estagio']}"?> + '" class="label label-danger delete">Deletar</a></td>' +               
                        "</tr>");
                dialog.dialog("close");
            }
            return valid;
        }

        function saveVisita() {
            $.ajax({
                url: '<?= URL ?>estagios/addVisita',
                type: 'POST',
                data: {data: data.val(), horario: horario.val(), resumo: resumo.val(), estagio_id: estagio_id},
                success: function (data) {
                    console.log(data);
                },
                error: function (ts) {
                    alert(ts.responseText)
                }
            });
        }

        dialog = $("#dialog-form").dialog({
            autoOpen: false,
            height: 410,
            width: 400,
            modal: true,
            buttons: {
                "Create an account": addVisita,
                Cancel: function () {
                    dialog.dialog("close");
                }
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("form").on("submit", function (event) {
            event.preventDefault();
            addVisita();
        });

        $("#create-user").button().on("click", function () {
            dialog.dialog("open");
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        //Date range picker
        $('#reservation').datepicker("option", "dateFormat", "yy-mm-dd");

    });
</script>