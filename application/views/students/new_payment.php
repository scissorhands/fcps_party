<div class="container">
	<br>
	<br>
	<br>
	<h4><?php echo $title; ?></h4>
	<div class="row">
		<div class="col-md-3"><label>Estudiante</label></div>
		<div class="col-md-3"><?php echo $order->full_name; ?></div>
		<div class="col-md-3"><label>Promo</label></div>
		<div class="col-md-3"><?php echo $order->promo_name; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3"><label>Invitados</label></div>
		<div class="col-md-3"><?php echo $order->invited_num; ?></div>
		<div class="col-md-3"><label>Precio diferencia</label></div>
		<div class="col-md-3"><?php echo $order->gap_price; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3"><label>Precio Estudiante</label></div>
		<div class="col-md-3"><?php echo $order->student_price; ?></div>
		<div class="col-md-3"><label>Costo Invitados</label></div>
		<div class="col-md-3"><?php echo $order->total_invited_price; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3"><label>Total a pagar</label></div>
		<div class="col-md-3">
			<?php echo $order->total_invited_price + $order->student_price; ?>
		</div>
		<div class="col-md-3"><label>Total pagado</label></div>
		<div class="col-md-3"><?php echo $order->total_paid; ?></div>
	</div>
	<div class="row">
		<div class="col-md-3"><label>Por pagar</label></div>
		<div class="col-md-3">
			<?php echo  ($order->total_invited_price + $order->student_price) - $order->total_paid; ?>
		</div>
	</div>

	<?php echo validation_errors("<div class='alert alert-danger'>","</div>"); ?>
	<?php echo form_open('students/new_payment/'.$order->id, 'class="form"', array("order_id" => $order->id )); ?>
		<label>Cantidad a pagar: </label>
		<?php echo form_input('amount', ''); ?>
		<br>
		<?php echo form_submit('submit', 'Hacer pago', 'class="btn btn-primary btn-small"'); ?>
	<?php echo form_close() ?>
</div>