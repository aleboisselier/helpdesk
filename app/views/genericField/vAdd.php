<legend>Ajout d'un champ</legend>

<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $genericfield->getId()?>">
	<input type="text" name="libelle" value="<?php echo $genericfield->getLibelle()?>" placeholder="Entrez un champs" class="form-control">
	<select class="form-control" name="idgenericfield">
	<?php echo $select?>
	</select>
</div>
