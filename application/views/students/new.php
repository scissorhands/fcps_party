<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open( 'students/new_student', 'class="form"' ); ?>
		<label>Nombre: </label>
		<?php echo form_input('name', '' ); ?>
		<label>Apellidos: </label>
		<?php echo form_input('last_name', '' ); ?>
		<label>Teléfono: </label>
		<?php echo form_input('phone', '' ); ?>
		<label>Correo: </label>
		<?php echo form_input('email', '' ); ?>
		<br>
		<br>
		<?php echo form_submit('submit', 'Registrar estudiante', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>