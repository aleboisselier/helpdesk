<?php
	use micro\views\Gui;
?>
<form method="POST" action="messages/update">
	<div class="form-group">
		
		<input type="hidden" name="id" value="<?=$message->getId()?>">
		<label for="idTicket">Ticket</label>
		<select class="form-control" name="idTicket" id="idTicket">
			<?=Gui::select($tickets, $idTicket, "Sélectionner un ticket...")?>
		</select>
		
		<label for="contenu"> Contenu du message</label>
		<textarea class="form-control ckeditor" id="contenu" name="contenu">
			<?= $message->getContenu()?>
		</textarea>
		
		<input type="text" class="form-control" disabled name="utilisateur" value="<?=$_SESSION["user"] ?>">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Valider">
	</div>
</form>