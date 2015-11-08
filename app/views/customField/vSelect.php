<form action="CustomFields/filter" method="post" name="selectFieldForm" id="selectFieldForm">
	<label for="idField">Liste des champ ajoutable :</label>
	<select class="form-control select" name="idField">
		<?php echo $fieldList;?>
	</select>
</form>

<div class="selectedField">
</div>
