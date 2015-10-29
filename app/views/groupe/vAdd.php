<form method="post" action="Groupes/update">
<fieldset>
<legend>Ajouter/modifier un Groupe</legend>
<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $groupe->getId()?>">
	<input type="text" name="libelle" value="<?php echo $groupe->getLibelle()?>" placeholder="Entrez un libelle" class="form-control">
</div>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>Groupes">Annuler</a>
</div>
</fieldset>
</form>