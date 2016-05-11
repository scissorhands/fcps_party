<div class="container">
	<br>
	<br>
	<br>
	<div class="row">
		<h4><?php echo $title; ?></h4>
		<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
		<?php echo form_open('promo_orders/edit_payment/'.$payment->id, 'class="form"', $hidden); ?>
			<label>Cantidad a pagar: </label>
			<?php echo form_input('amount', $payment->amount); ?>
			<br>
			<?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary btn-small"'); ?>
		<?php echo form_close() ?>
	</div>
</div>