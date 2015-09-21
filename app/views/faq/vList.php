<div class="list">
<?php 
// echo count($faqs);

$baseHref=get_class($this); ?>
	<table class='table table-striped'>
		<thead><tr><th>Questions</th></tr></thead>
		<tbody>
			<?php if(empty($faqs)): ?>
				<tr><td>Aucun résulat ne correspond à votre recherche...</td></tr>
			<?php else: ?>
				<?php foreach ($faqs as $faq): ?>
					<tr>
					<td><?php echo $faq->toString(); ?></td>
					<td class='td-center'><a class='btn btn-primary btn-xs' href='<?php echo $baseHref."/frm/".$faq->getId(); ?>'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
						"<td class='td-center'><a class='btn btn-warning btn-xs' href='<?php echo $baseHref."/delete/".$faq->getId(); ?>'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</tbody>
	</table>
	<a class='btn btn-primary' href='<?php echo $config["siteUrl"].$baseHref."/frm"; ?>'>Ajouter...</a>
</div>