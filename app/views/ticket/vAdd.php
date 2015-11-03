
<legend>Ajout/Modification/Affichage d'un ticket</legend>

<div class="panel <?php if ($ticket->getType() == 'demande') : ?> panel-info <?php else: ?> panel-warning <?php endif; ?>">
	<div class="panel-heading">
		<h3 class="panel-title">
			Ticket : <?php echo $ticket->toString()?>
			<span class="pull-right glyphicon glyphicon-chevron-down montreInfoTicket" id="<?php echo $ticket->getId()?>;false"></span>
		</h3>
	</div>
	<div class="panel-body infoTicket">
