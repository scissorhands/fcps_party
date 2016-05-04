<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open('students/new_payment/'.$order->id, 'class="form"', array("order_id" => $order->id )); ?>
		<label>Amount: </label>
		<?php echo form_input('amount', ''); ?>
		<br>
		<?php echo form_submit('submit', 'New Payment', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>