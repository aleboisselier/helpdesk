<form action="CustomFields/filter" method="post" name="selectFieldForm" id="selectFieldForm">
	<label for="idField">Liste des champ ajoutable :</label>
	<select class="form-control select" name="idField">
		<?php echo $listGenericField;?>
	</select>
	<button type="submit">Valider</button>
</form>

<?php if(isset($_POST['idField'])):
	echo $pouet; ?>
	<div class="selectedField">
		<?="<".$selectField->getBaseHtml." ".$selectField->getPropriete." >"; ?>
	</div>
<?php endif ?>