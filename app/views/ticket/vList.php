<div id="list">
	<br>
	<?php if (count($tickets) == 0):?>
			<p class="text-info">Aucun ticket ne correspond à votre recherche...</p>
	<?php else: ?>
		<?php 
			foreach ($tickets as $ticket): 
				$date = date_create($ticket->getDateCreation());
				$tPerPage = $_SESSION['nbPerPage'];
				if ($ticket->getType() == "demande") {
					$demande = 1;
				}else{
					$demande = 0;
				}
		?>
				<div class="panel panel-<?php if($demande): ?>info<?php else: ?>warning<?php endif; ?> panel-ticket" style="font-size:110%;" id="s<?= $ticket->getId();?>">
					<div class="panel-heading">
						<?php if($ticket->getStatut()->getId() == 1 && Auth::isAdmin()) : ?>
								<span class="label label-primary"><span class="glyphicon glyphicon-alert"></span> Nouveau</span>
						<?php endif; ?>
						<b> <?= $ticket->getTitre();?></b> - <?= $ticket->getStatut();?>
						<?php if($demande): ?>
							<span class="label label-info pull-right">Demande</span>
						<?php else: ?>
							<span class="label label-warning pull-right">Incident</span>
						<?php endif; ?>
					</div>
					<div class="panel-body">
						<div class="col-md-12" >
							<?php if($demande): ?>
								Demande de <label> <?= $ticket->getCategorie(); ?></label>, effectuée le  <label> <?= $date->format('d.m.Y');?> </label> à <label> <?= $date->format('H:i');?></label>, par <label> <?= $ticket->getUser()->getLogin(); ?></label>.
							<?php else: ?>
								Problème de <label> <?= $ticket->getCategorie(); ?></label>, signalé le  <label> <?= $date->format('d.m.Y');?> </label> à <label> <?= $date->format('H:i');?></label>, par <label> <?= $ticket->getUser()->getLogin(); ?></label>.
							<?php endif; ?>
							<?php if($ticket->getStatut()->getId() > 1): ?> 
								<br>Attribué à : <label><?= $ticket->getAdmin()->getLogin(); ?></label>.
							<?php endif; ?>
						</div>
						<div class="clearfix" style="margin-top:2%">&nbsp;</div>
						<?php if(Auth::isAdmin()): ?>
							<div class="col-md-8" >
								<div class="btn-group" role="group">
									<?php error_reporting(0);echo Tickets::getButtonGroup($ticket);error_reporting(-1);?>
								</div>
							</div>
						<?php endif; ?>
						<div class="col-md-4 pull-right">
							<a href="Tickets/frm/<?= $ticket->getId(); ?>" class="btn btn-default pull-right detailTicket"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Afficher les détails</a>
						</div>
					</div>
				</div>
		<?php endforeach; ?>

		<?php 
			$nbPages = ceil($nbTickets/$tPerPage);
		?>

		<div class="text-center" id="pagination">
			<nav>
				<ul class="pagination">
					<li <?php if($currPage == 1) :?> class="disabled" <?php else:?> class="chgList prevPage" id="<?php echo ($currPage-1).';'.$tPerPage; ?>" <?php endif; ?>>
						<a aria-label="Précédent">
							<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
						</a>
					</li>
						<?php for($i = 1; $i<=$nbPages; $i++): ?>
							<li <?php if($i == $currPage):?>class="active"<?php endif;?> id="<?php echo $i.';'.$tPerPage; ?>" class="chgList"><a><?php echo $i; ?></a></li>
						<?php endfor; ?>
					<li <?php if($currPage == $nbPages) :?> class="disabled nextPage" <?php else:?> class="chgList nextPage" id="<?php echo ($currPage+1).';'.$tPerPage; ?>" <?php endif; ?>>
						<a aria-label="Suivant" >
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
<?php endif; ?>
