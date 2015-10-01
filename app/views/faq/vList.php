<div class="col-md-8">
<?php $baseHref=get_class($this); ?>
	<table class='table table-striped'>
		<thead><tr><th colspan="4"><h3>Questions</h3></th></tr></thead>
		<tbody>
			<?php foreach ($faqs as $faq): ?>
				<tr>
					<td><?php echo $faq->getTitre(); ?></td>
					<?php if($faq->getUser()->getId() == Auth::getUser()->getId()): ?>
						<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
						<td class='td-center'><a class='btn btn-danger btn-xs' href='<?php echo $baseHref."/delete/".$faq->getId(); ?>'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
						<?php if($faq->getPublished()): ?>
							<td class='td-center'><a class='btn btn-warning btn-xs suspend' id="<?php echo $faq->getId(); ?>;0"><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></a></td>
						<?php else: ?>
							<td class='td-center'><a class='btn btn-success btn-xs suspend' id="<?php echo $faq->getId(); ?>;1"><span class='glyphicon glyphicon-check' aria-hidden='true'></span></a></td>
						<?php endif; ?>
					<?php else: ?>
						<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a></td>
					<?php endif;?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<a class='btn btn-primary pull-right' href='<?php echo $config["siteUrl"].$baseHref."/frm"; ?>' style="margin-left:2%;">Ajouter...</a>
</div>