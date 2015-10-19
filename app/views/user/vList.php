<table class='table table-striped'>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<a class='btn btn-primary pull-right' href='#' style="margin-left:2%;">Ajouter...</a>