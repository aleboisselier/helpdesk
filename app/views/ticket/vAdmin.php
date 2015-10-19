<div id="menu">
	<ul class="nav nav-tabs nav-justified">
		<li class="active">
			<a class="link chgList" id="1;<?php echo $_SESSION['nbPerPage']; ?>;new">Nouveaux Tickets
				<?php if ($newTickets > 0): ?>
					<span class="badge"><?php echo $newTickets; ?></span>
				<?php endif; ?>
			</a>
		</li>
		<li><a class="link chgList" id="1;<?php echo $_SESSION['nbPerPage']; ?>;my">Mes Tickets</a></li>
		<li><a class="link chgList" id="1;<?php echo $_SESSION['nbPerPage']; ?>;closed">Tickets Clos</a></li>
	</ul>
</div>