<form method="post" action="tickets/update">
<fieldset>
<legend>Ajouter/Modifier un ticket</legend>
<div class="form-group">
	<input type="submit" value="Valider" class="btn btn-default">
	<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>tickets">Annuler</a>
</div>
<div class="alert alert-info">Ticket : <?php echo $ticket->toString()?> 
	<div class='btn btn-primary pull-right glyphicon glyphicon-chevron-down montreInfoTicket' style='margin-top:-1%' id="<?php echo $ticket->getId()?>;false"></div>";
</div>
