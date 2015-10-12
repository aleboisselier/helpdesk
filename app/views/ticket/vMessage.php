<legend>Messages</legend>

<?php  foreach($messages as $message):
	$date = date_create($ticket->getDateCreation());
 ?>
<div class="col-md-9 <?php if(!$message->getUser()->getAdmin()) : ?>pull-right<?php endif; ?> message" id="<?=$message->getId() ?>">
	<div class="panel <?php if($message->getUser()->getAdmin()) : ?>panel-primary<?php else: ?>panel-user<?php endif; ?>">
		<div class="panel-heading">
			<h3 class="panel-title">
				<?php echo $message->getUser() ?> 
			</h3>
		</div>
		<div class="panel-body">
			<?= $message->getContenu(); ?>
		</div>
		<div class="panel-footer">
			<small class="">&nbsp;</small>
			<small class="pull-right"><i> Envoyé le <?php echo $date->format('d.m.Y à H:i');?></i></small> 
		</div>
	</div>
</div>
<?php endforeach; ?>

<legend>Nouveau Message</legend>
<div class="ecrireMessage col-md-12 col-xs-12">
	<form method="POST" name="frm" id="frm" onsubmit="return false;">
		<div class="form-group">
			<input type="hidden" name="id" value="">
			<input type="hidden" name="idTicket" value="<?= $ticket->getId() ?>">
			<label for="contenu"><h4>Contenu du message</h4></label>
			<textarea class="form-control ckeditor" id="contenu" name="contenu" > </textarea>
			<input type="hidden" name="idUser" value="<?= Auth::getUser()->getId() ?>">
		</div>
		<div class="form-group">
			<a class="btn btn-primary submitMessage">Envoyer</a>
		</div>
	</form>
</div>