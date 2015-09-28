<?php  foreach($messages as $message): ?>
	<div class='<?php if($message->getUser()->getAdmin()) : ?>messageAdmin pull-left <?php else: ?>messageUser pull-right <?php endif; ?>' id="<?=$message->getId(); ?>">
		<h4><?= $message->getUser(); ?></h4>
		<br>
		<?= $message->getContenu(); ?>
	</div>
	<br>
<?php endforeach; ?>

<form method="POST" action="messages/update">
</form>