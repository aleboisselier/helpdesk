<div class="list col-xs-6 col-sm-8 col-md-8">
<?php $baseHref=get_class($this); ?>
	<table class='table table-striped'>
		<thead><tr><th><h3>Questions</h3></th></tr></thead>
		<tbody>
			<?php foreach ($faqs as $faq): ?>
				<tr>
				<td><?php echo $faq->getTitre(); ?></td>
				<?php if($faq->getUser()->getId() == Auth::getUser()->getId()): ?>
					<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
						<td class='td-center'><a class='btn btn-warning btn-xs' href='<?php echo $baseHref."/delete/".$faq->getId(); ?>'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
					</tr>
				<?php else: ?>
					<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></a></td>
				<?php endif;?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<a class='btn btn-primary pull-right' href='<?php echo $config["siteUrl"].$baseHref."/frm"; ?>' style="margin-left:2%;">Ajouter...</a>
</div>