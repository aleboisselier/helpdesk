<div class="form-group">
	<select class="form-control" name="idgenericfield">
		<?php foreach($genericFields as $genericField): ?>
		<option value="<?=$genericField->getId(); ?>"><?=$genericField->getLibelle(); ?></option>;
		<?php endforeach; ?>
	</select>
</div>
