<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open( 'students/edit_student/'.$student_id, 'class="form"', array( "student_id" => $student_id ) ); ?>
		<label>Nombre: </label>
		<?php echo form_input('name', $student->name ); ?>
		<label>Apellidos: </label>
		<?php echo form_input('last_name', $student->last_name ); ?>
		<label>Teléfono: </label>
		<?php echo form_input('phone', $student->phone_number ); ?>
		<label>Correo: </label>
		<?php echo form_input('email', $student->email ); ?>
		<br>
		<br>
		<?php echo form_submit('submit', 'Editar estudiante', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>