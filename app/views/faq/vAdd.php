<form method="post" action="faqs/update">
	<fieldset>
		<legend>Ajouter/Modifier une Question</legend>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default">
			<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>
		</div>

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $faq->getId()?>">
			
			<label for="titre">Titre</label>
			<input type="text" name="titre" id="titre" value="<?php echo $faq->getTitre()?>" placeholder="Entrez le titre" class="form-control">

			<label for="idCategorie">Catégorie</label>
			<select class="form-control" name="idCategorie">
			<?php echo $listCat;?>
			</select>
			
			<label for="description">Description</label>
			<textarea name="description" id="description" placeholder="Entrez la description" class="form-control" class="ckeditor"><?php echo $faq->getContenu()?></textarea>
		</div>
		<div class="form-group">
			
			<label>Rédactuer</label>
			<div class="form-control" disabled><?php echo $faq->getUser()?></div>
			
			<label for="dateCreation">Date de création</label>
			<input type="text" name="dateCreation" id="dateCreation" value="<?php echo $faq->getDateCreation()?>" disabled class="form-control">
			
			<input type="hidden" name="idUser" value="<?php echo $faq->getUser()->getId()?>">
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-default">
			<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>faqs">Annuler</a>
		</div>
	</fieldset>
</form>
