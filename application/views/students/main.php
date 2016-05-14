<div class="container">
<br>
<br>
<br>
	<?php if($this->session->flashdata("insert_msg")){ ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata("insert_msg"); ?></div>
	<?php } ?>
	<table class="table table-stripped" id="students-list">
		<thead>
			<tr>
				<th>nombre</th>
				<th>promo</th>
				<th>pases</th>
				<th>precio diferencia</th>
				<th>precio graduado</th>
				<th>costo invitados</th>
				<th>costo total</th>
				<th>pagado</th>
				<th>menu</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<?php echo anchor('students/new_student', 'Agregar estudiante', 'class="btn btn-primary"'); ?>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteModalLabel">Borrar estudiante </h4>
      </div>
      <?php echo form_open('students/delete_student', '' ); ?>
      	<input type="hidden" id="std_id" name="std_id" value="0" />
	      <div class="modal-body">
	      	<p>Al borrar un estudiante se perderan todos sus datos de registro así como pedidos y pagos que haya realizado.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        <?php echo form_submit('submit', 'Eliminar', 'class="btn btn-danger"'); ?>
	      </div>
	  <?php echo form_close(); ?>
    </div>
  </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
$( document ).ready( function(){
	$("#students-list").dataTable( {
		"processing": true,
        "serverSide": true,
		"ajax": "<?php echo base_url(); ?>datatables/students_list"
	});

	$('.dropdown-toggle').dropdown();

	$('#deleteModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var student_id = button.data('studentid') // Extract info from data-* attributes
	  var modal = $(this)
	  modal.find('.modal-title').text('Borrar estudiante #' + student_id)
	  $("#std_id").val(student_id)
	});
});
</script>