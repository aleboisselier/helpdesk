<?php 
	if($faq->getUser() == Auth::getUser() || $faq->getId() == null){
		$creator = 1;
	} else{
		$creator = 0;
	}

	if ( $faq->getTitre() != null){
		$newFaq = 0;
	}else{
		$newFaq = 1;
	}
?>
<form method="post" action="faqs/update" id="faqForm">
	<fieldset>
		<legend>Ajouter/Modifier une Question</legend>
		<?php if($creator): ?>
			<div class="form-group">
				<input type="submit" value="Valider" class="btn btn-default">
				<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>
			</div>
		<?php endif; ?>
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $faq->getId()?>">
			
			<label for="titre">Titre</label>
			<input type="text" name="titre" id="titre" value="<?php echo $faq->getTitre()?>" placeholder="Entrez le titre" class="form-control" <?php if(!$creator): ?> disabled <?php endif; ?>>

			<label for="idCategorie">Catégorie</label>
			<select class="form-control" name="idCategorie" id="categorie"> <?php if(!$creator): ?> disabled <?php endif; ?>>
			<?php echo $listCat;?>
			</select>
			
			<label for="description">Contenu</label>
			<textarea name="contenu" id="contenu" placeholder="Entrez la description" class="form-control" class="" <?php if(!$creator): ?> disabled <?php endif; ?> ><?php echo $faq->getContenu()?></textarea>
		</div>
		<div class="form-group">
			
			<label>Rédacteur</label>
			<?php if ( $newFaq == 0): ?>
				<div class="form-control" disabled><?php echo $faq->getUser()?></div>
				<label for="dateCreation">Date de création</label>
				<input type="text" name="dateCreation" id="dateCreation" value="<?php echo $faq->getDateCreation()?>" disabled class="form-control">
			<?php else: ?>
				<div class="form-control" disabled><?php echo Auth::getUser()?></div>
			<?php endif; ?>
			
			
			<input type="hidden" name="idUser" value="<?php echo Auth::getUser()->getId();?>">
		</div>
		<?php if($creator): ?>
			<div class="form-group">
				<input type="submit" value="Valider" class="btn btn-default">
				<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>
			</div>
		<?php endif; ?>
	</fieldset>
</form>
