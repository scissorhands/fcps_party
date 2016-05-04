<div class="container">
<br>
<br>
<br>
	<?php echo $this->session->flashdata("insert_msg"); ?>
	<table class="table table-stripped" id="students-list">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>email</th>
				<th>phone number</th>
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