<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open('promo_orders/edit_promo_order/'.$order->student_id, 'class="form"', array("student_id" => $order->student_id )); ?>
		<label>Paquete: </label><?php echo form_dropdown('promo_id', $promos, $order->promo_id ); ?>
		<label>Total invitados: </label>
		<input type='number' name="total_invited" type="number" min="1" value="<?php echo $order->invited; ?>">
		<br>
		<?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>