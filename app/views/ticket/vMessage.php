<div class="container">
	<div class="row listMessages">
		<?php  foreach($messages as $message): ?>
			<div class='<?php if($message->getUser()->getAdmin()) : ?>messageAdmin pull-left col-md-10 col-xs-10 <?php else: ?>messageUser pull-right col-md-10 col-xs-10 <?php endif; ?>' id="<?=$message->getId(); ?>">
				<h4><?= $message->getUser(); ?></h4>
				<br>
				<?= $message->getContenu(); ?>
			</div>
			<br>
		<?php endforeach; ?>
	</div>

	<?php if(isset($message)):?>
	<div class="ecrireMessage col-md-12 col-xs-12">
		<form method="POST" name="postMessage">
			<div class="form-group">
				<input type="hidden" name="idMessage" value="<?=$message->getId()?>">
				<input type="hidden" name="idTicket" value="<?=$message->getTicket()->getId()?>">
				<label for="contenu"><h4>Contenu du message</h4></label>
				<textarea class="form-control ckeditor" id="contenu" name="contenu">
				</textarea>
				<input type="hidden" name="idUser" value="<?php echo $message->getUser()->getId()?>">
			</div>
			<div class="form-group">
				<a class="btn btn-primary submitMessage">Envoyer</a>
			</div>
		</form>
	</div>
	<?php endif; ?>
</div>