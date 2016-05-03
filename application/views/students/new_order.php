<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open('students/new_order/'.$student->id, 'class="form"', array("student_id" => $student->id )); ?>
		<label>Promo: </label><?php echo form_dropdown('promo_id', $promos ); ?>
		<label>Total invited: </label>
		<input type='number' name="total_invited" type="number" min="1" max="15" value="1">
		<br>
		<?php echo form_submit('submit', 'New Order', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>