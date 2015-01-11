<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal"></a>
                    <h3>Alerta de exclusão!</h3>
            </div>
            <div class="modal-body">
                    <p>Tem certeza de que deseja excluir esta categoria?</p>
            </div>
            <div class="modal-footer">
                    <a id="deleteCancel" href="#" class="btn">Cancelar</a>
                    <a id="deleteConfirm" href="#" class="btn btn-danger"><i class="icon-trash icon-white"></i> Excluir</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var deleteUrl;

$(document).ready( function(){

	$('.delete').click( function(e){
                console.log('aqui');
		e.preventDefault();
		deleteUrl = $(this).attr('href');
                
                console.log(deleteUrl);
		$('#delete').modal('show').on( 'shown', function(){
                    console.log(deleteUrl);
			$('#deleteConfirm').focus();
		});
	});

	$('#deleteCancel').click( function(e){
		e.preventDefault();
		$('#delete').modal('hide');
	});

	$('#deleteConfirm').click( function(e){
		window.location = deleteUrl;
	});
});
</script>