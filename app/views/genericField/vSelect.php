<div class="form-group">
	<select class="form-control" name="idgenericfield">
		<option value="none">Selectionner un champ</option>;
		<?php foreach($genericFields as $genericField): ?>
		<option value="<?=$genericField->getId(); ?>"><?=$genericField->getLibelle(); ?></option>;
		<?php endforeach; ?>
	</select>
</div>
