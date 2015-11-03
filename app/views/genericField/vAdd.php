<legend>Ajout d'un champ</legend>

<div class="form-group">
	<input type="hidden" name="id" value="<?php echo $champsCustom->getId()?>">
	<input type="text" name="libelle" value="<?php echo $champsCustom->getLibelle()?>" placeholder="Entrez un champs" class="form-control">
	<select class="form-control" name="idChampsCustom">
	<?php echo $select?>
	</select>
</div>
