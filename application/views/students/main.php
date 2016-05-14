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
<script type="text/javascript" charset="utf-8" async defer>
$( document ).ready( function(){
	$("#students-list").dataTable( {
		"processing": true,
        "serverSide": true,
		"ajax": "<?php echo base_url(); ?>datatables/students_list"
	});

	$('.dropdown-toggle').dropdown();
});
</script>