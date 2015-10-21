
<div class="container">
<?php
	if($_SESSION['logStatus'] == 'success'){
		$this->_showMessage("Bienvenue ".Auth::getUser()->getLogin().".", "success");
	}
	$_SESSION['logStatus'] = null;
?>

	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Bienvenue sur HelpDesk DOA</h1>
		</div>
	</div>
	<br>
	<div class="row">
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
	<div class="well well-lg">
		<div id="main">
			<fieldset>
				<legend>Données</legend>
				<a class="btn btn-link" href="#">Accueil</a>
				<a class="btn btn-default" href="Users">Utilisateurs</a>
				<a class="btn btn-primary" href="Categories">Catégories</a>
				<a class="btn btn-info" href="Tickets">Tickets</a>
				<a class="btn btn-success" href="Statuts">Statuts</a>
				<a class="btn btn-warning" href="Faqs">Faq</a>
				<a class="btn btn-danger" href="Messages">Messages</a>
				<a class="btn btn-danger" href="Tickets/messages/1">Messages d'un ticket</a>
			</fieldset>
			<fieldset>
				<legend>Connexion</legend>
					<a class="btn btn-default" href="Indexx/asAdmin">Connexion en tant qu'admin</a>
					<a class="btn btn-default" href="Indexx/asUser">Connexion en tant que user</a>
					<a class="btn btn-warning" href="Indexx/disconnect">Déconnexion</a>
			</fieldset>
			<fieldset>
				<legend>Exemples</legend>
					<a class="btn btn-link btAjax">Exemple ajax (liste des utilisateurs)</a>
			</fieldset>
		</div>
		<div id="response"></div>
	</div>

</div>
