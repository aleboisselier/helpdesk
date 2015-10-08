
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
		<div class="panel panel-primary">
		  <div class="panel-heading"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge"><?= count($notifs); ?></span></div>
		  <ul class="list-group">
			<?php foreach($notifs as $notif): ?>
				<a href="<?= $config['siteUrl'] ?>tickets/frm/<?= $notif->getTicket()->getId() ?>#<?php if($notif->getMessage() != null){ echo $notif->getMessage()->getId();}?>" class="list-group-item notif"><?= $notif; ?></a>
			<?php endforeach;?>
		  </ul>
		</div>
	</div>
	<div class="well well-lg">
		<div id="main">
			<fieldset>
				<legend>Données</legend>
				<a class="btn btn-link" href="#">Accueil</a>
				<a class="btn btn-default" href="users">Utilisateurs</a>
				<a class="btn btn-primary" href="categories">Catégories</a>
				<a class="btn btn-info" href="tickets">Tickets</a>
				<a class="btn btn-success" href="statuts">Statuts</a>
				<a class="btn btn-warning" href="faqs">Faq</a>
				<a class="btn btn-danger" href="messages">Messages</a>
				<a class="btn btn-danger" href="tickets/messages/1">Messages d'un ticket</a>
			</fieldset>
			<fieldset>
				<legend>Connexion</legend>
					<a class="btn btn-default" href="defaultc/asAdmin">Connexion en tant qu'admin</a>
					<a class="btn btn-default" href="defaultc/asUser">Connexion en tant que user</a>
					<a class="btn btn-warning" href="defaultc/disconnect">Déconnexion</a>
			</fieldset>
			<fieldset>
				<legend>Exemples</legend>
					<a class="btn btn-link" href="defaultc/ckEditorSample">Exemple ckEditor</a>
					<a class="btn btn-link btAjax">Exemple ajax (liste des utilisateurs)</a>
			</fieldset>
		</div>
		<div id="response"></div>
	</div>

</div>
