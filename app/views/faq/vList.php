<div class="col-md-8 faq-items">
	<?php $baseHref=get_class($this); 
		if(count($faqs) == 0):
	?>
		<p class="text-info">Aucun article ne correspond à votre recherche...</p>
	<?php else: ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if(Auth::isAdmin()): ?>
						<th colspan="3"><h3>Questions</h3></th>
						<th><a class='btn btn-primary pull-right' href='<?php echo $config["siteUrl"].$baseHref."/frm"; ?>' style="margin-left:2%;" id="faqAddBtn">Ajouter...</a></th>
					<?php else: ?>
						<th colspan="4"><h3>Questions</h3></th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($faqs as $faq): ?>
					<tr class="faq-item" id="<?php echo $faq->getId(); ?>">
						<td class="titreFaq" ><?php echo $faq->getTitre(); ?></td>
						<td class='td-center voirFaq'><a class='btn btn-primary btn-xs btnVoirFaq' href='<?php echo $baseHref."/view/".$faq->getId(); ?>' data-toggle="tooltip" data-placement="top" title="Lire l'Article"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
						<?php if($faq->getUser()->getId() == Auth::getUser()->getId()): ?>
							<td class='td-center'><a class='btn btn-danger btn-xs' href='<?php echo $baseHref."/delete/".$faq->getId(); ?>' id="del-<?php echo $faq->getId(); ?>" data-toggle="tooltip" data-placement="top" title="Supprimer l'Article"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
							<?php if($faq->getPublished()): ?>
								<td class='td-center publish'><a class='btn btn-warning btn-xs suspend' id="<?php echo $faq->getId(); ?>;0" data-toggle="tooltip" data-placement="top" title="Suspendre l'Article"><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></a></td>
							<?php else: ?>
								<td class='td-center publish'><a class='btn btn-success btn-xs suspend' id="<?php echo $faq->getId(); ?>;1" data-toggle="tooltip" data-placement="top" title="Publier l'Article"><span class='glyphicon glyphicon-check' aria-hidden='true'></span></a></td>
							<?php endif; ?>
						<?php endif;?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>