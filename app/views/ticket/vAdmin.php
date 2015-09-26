<ul class="nav nav-tabs nav-justified">
	<li class="active">
		<a class="link chgList" id="1;<?php echo $nbPerPage; ?>; idStatut=1">Nouveaux Tickets
			<?php if ($newTickets > 0): ?>
				<span class="badge"><?php echo $newTickets; ?></span>
			<?php endif; ?>
		</a>
	</li>
	<li><a class="link chgList" id="1;<?php echo $nbPerPage; ?>;idAdmin = <?php echo Auth::getUser()->getId();?>">Mes Tickets</a></li>
</ul>