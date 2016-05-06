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
				<th>precio de diferencia</th>
				<th>precio graduado</th>
				<th>precio total de invitados</th>
				<th>pagado</th>
				<th>por pagar</th>
				<th>menu</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<script type="text/javascript" charset="utf-8" async defer>
$( document ).ready( function(){
	$("#students-list").dataTable( {
		"processing": true,
        "serverSide": true,
		"ajax": "<?php echo base_url(); ?>datatables/students_list"
	});
});
</script>