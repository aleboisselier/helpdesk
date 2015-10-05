<?php $baseHref=get_class($this); ?>
<table class='table table-striped'>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td> <?=$user; ?> </td>
				<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$user->getId() ?>'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
				<td class='td-center'><a class='btn btn-warning btn-xs' href='<?php echo $baseHref."/delete/".$user->getId() ?>'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<a class='btn btn-primary pull-right' href='#' style="margin-left:2%;">Ajouter...</a>