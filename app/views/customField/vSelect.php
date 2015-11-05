<form action="CustomField/filter" method="post" name="selectFieldForm" id="selectFieldForm">
	<label for="idField">Liste des champ ajoutable :</label>
	<select class="form-control select" name="idField">
		<?php echo $listGenericField;?>
	</select>
</form>
<?=$pouet; ?>
<div class="selectedField">
	<?="<".$selectField->getBaseHtml." ".$selectField->getPropriete." >"; ?>
</div>