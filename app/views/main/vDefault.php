
<div class="container">
<?php if(isset($message)) echo $this->_showDisplayedMessage($message); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary panel-notifications">
			  <div class="panel-heading"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge"><?= count($notifs); ?></span></div>
			  <ul class="list-group">
			  	<?php if(count($notifs) > 0): ?>
					<?php foreach($notifs as $notif): ?>
						<a href="<?= $config['siteUrl'] ?>Tickets/frm/<?= $notif->getTicket()->getId() ?>#<?php if($notif->getMessage() != null){ echo $notif->getMessage()->getId();}?>" class="list-group-item notif"><?= $notif; ?></a>
					<?php endforeach;?>
				<?php else:?>
					<li class="list-group-item">Aucune notification...</li>
				<?php endif;?>
			  </ul>
			</div>
		</div>
	</div>
<?php if (Auth::getUser()->getGroupe()->getId() == 2):?>
	<div class="row">
		<div class="col-md-6">
			<div class="well well-lg">
				<div>
					<fieldset>
						<legend>Tickets :</legend>
						<a class="btn btn-info btn-lg btn-block" href="Tickets"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Mes Tickets</a>
						<a class="btn btn-success btn-lg btn-block" href="Tickets/frm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Créer un Ticket</a>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well well-lg">
				<div>
					<fieldset>
						<legend>Foire aux Questions :</legend>
						<a class="btn btn-info btn-lg btn-block" href="Faqs"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Voir les Articles</a>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
<?php else:?>
	<div class="row">
		<div class="col-md-6">
			<div class="well well-lg">
				<div>
					<fieldset>
						<legend>Tickets :</legend>
						<a class="btn btn-info btn-lg btn-block" href="Tickets"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Gestion des Tickets</a>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="well well-lg">
				<div>
					<fieldset>
						<legend>Foire aux Questions :</legend>
						<a class="btn btn-info btn-lg btn-block" href="Faqs"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Voir les Articles</a>
						<a class="btn btn-success btn-lg btn-block" href="Faqs"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Créer un Article</a>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div id="main">
			<fieldset>
				<legend>Gestion Interne :</legend>
				<div class="col-md-4"><a class="btn btn-default btn-block" href="Users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilisateurs</a></div>
				<div class="col-md-4"><a class="btn btn-primary btn-block" href="Categories"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Catégories</a></div>
				<div class="col-md-4"><a class="btn btn-success btn-block" href="Statuts"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Statuts</a></div>
			</fieldset>
		</div>
	</div>
<?php endif;?>

