<div id="list">
	<br>
	<?php foreach ($tickets as $ticket): 
		$date = date_create($ticket->getDateCreation());
		?>
		<?php if ($ticket->getType() == "demande"): ?>
			<div class="panel panel-info" style="font-size:110%;">
				<div class="panel-heading">
					<?php if($ticket->getStatut()->getId() == 1) : ?>
							<span class="label label-primary"><span class="glyphicon glyphicon-alert"></span> Nouveau</span>
					<?php endif; ?>
					<b> <?php echo $ticket->getTitre();?></b> - <?php echo $ticket->getStatut();?>
					<span class="label label-info pull-right">Demande</span>
				</div>
				<div class="panel-body">
					<div class="col-md-12" >
						Demande de <label> <?php echo $ticket->getCategorie(); ?></label>, effectuée le  <label> <?php echo $date->format('d.m.Y');?> </label> à <label> <?php echo $date->format('H:i');?></label>, par <label> <?php echo $ticket->getUser()->getLogin(); ?></label>.
						<?php if($ticket->getStatut()->getId() > 1): ?> 
							<br>Attribué à : <label><?php echo $ticket->getAdmin()->getLogin(); ?></label>.
						<?php endif; ?>
					</div>
					<div class="clearfix" style="margin-top:2%">&nbsp;</div>
					<div class="col-md-4">
						<a href="tickets/frm/<?php echo $ticket->getId(); ?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Afficher les détails</a>
					</div>
					<div class="col-md-8" >
						<div class="btn-group pull-right" role="group">
							<?php error_reporting(0);echo Tickets::getButtonGroup($ticket);error_reporting(-1);?>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="panel panel-warning" style="font-size:110%;">
				<div class="panel-heading">
					<?php if($ticket->getStatut()->getId() == 1) : ?>
							<span class="label label-primary"><span class="glyphicon glyphicon-alert"></span> Nouveau</span>
					<?php endif; ?>
					<b> <?php echo $ticket->getTitre();?></b> - <?php echo $ticket->getStatut();?>
					<span class="label label-warning pull-right">Incident</span>
				</div>
				<div class="panel-body">
					<div class="col-md-12" >
						Problème de <label> <?php echo $ticket->getCategorie(); ?></label>, signalé le  <label> <?php echo $date->format('d.m.Y');?> </label> à <label> <?php echo $date->format('H:i');?></label>, par <label> <?php echo $ticket->getUser()->getLogin(); ?></label>.
						<?php if($ticket->getStatut()->getId() > 1): ?> 
							<br>Attribué à : <label><?php echo $ticket->getAdmin()->getLogin(); ?></label>.
						<?php endif; ?>
					</div>
					<div class="clearfix" style="margin-top:2%">&nbsp;</div>
					<div class="col-md-4">
						<a href="tickets/frm/<?php echo $ticket->getId(); ?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Afficher les détails</a>
					</div>
					<div class="col-md-8" >
						<div class="btn-group pull-right" role="group">
							<?php error_reporting(0);echo Tickets::getButtonGroup($ticket);error_reporting(-1);?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php 
		$nbPages = ceil($nbTickets/$tPerPage);
	?>

	<div class="text-center" id="pagination">
		<nav>
			<ul class="pagination">
				<li <?php if($currPage == 1) :?> class="disabled" <?php else:?> class="chgList" id="<?php echo ($currPage-1).';'.$tPerPage; ?>" <?php endif; ?>>
					<a aria-label="Précédent">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					</a>
				</li>
					<?php for($i = 1; $i<=$nbPages; $i++): ?>
						<li <?php if($i == $currPage):?>class="active"<?php endif;?> id="<?php echo $i.';'.$tPerPage; ?>" class="chgList"><a><?php echo $i; ?></a></li>
					<?php endfor; ?>
				<li <?php if($currPage == $nbPages) :?> class="disabled" <?php else:?> class="chgList" id="<?php echo ($currPage+1).';'.$tPerPage; ?>" <?php endif; ?>>
					<a aria-label="Suivant" >
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
