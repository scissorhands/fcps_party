<?php 
	if($total > $student->total_paid){
		$icon = 'list-alt';
	} else {
		$icon = $promo_id? 'trash' : 'tag';
	} 
?>
<div class="dropdown">
	<a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="btn btn-default">
		<span class="glyphicon glyphicon-<?php echo $icon; ?>" aria-hidden="true"></span>
		<span class="caret"></span>
	</a>

	<ul class="dropdown-menu" aria-labelledby="dLabel">
		<?php if( $total > $student->total_paid ): ?>
			<li>
				<?php echo anchor('students/new_payment/'.$promo_id, 'Pagos' ); ?>
			</li>
			<li>
				<?php echo anchor('promo_orders/edit_promo_order/'.$student->student_id, 'Editar pedido' ); ?>
			</li>
		<?php elseif(!$promo_id): ?>
			<li>
				<?php echo anchor('students/new_order/'.$student->student_id, 'Crear pedido' ); ?>
			</li>
		<?php endif; ?>
		<li>
			<a href="#" data-toggle="modal" data-target="#deleteModal" data-studentid="<?php echo $student->student_id; ?>">
				Borrar estudiante
			</a>
		</li>
	</ul>
</div>