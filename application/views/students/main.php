<div class="container">
<br>
<br>
<br>
	<table class="table table-stripped">
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
			<?php foreach ($students as $student): ?>
			<tr>
				<td><?php echo $student->name ;?></td>
				<td><?php echo $student->last_name ;?></td>
				<td><?php echo $student->email ;?></td>
				<td><?php echo $student->phone_number ;?></td>
				<td>
					<?php echo anchor("promo_orders/add/".$student->id, "Add Promo", 'class="btn btn-success"' ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>