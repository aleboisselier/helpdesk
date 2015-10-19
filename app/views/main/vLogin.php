<div class="container" style="margin-top:2%;">
<?php 
	switch ($_SESSION['logStatus']) {
		case 'fail':
			$this->_showMessage("ERREUR : Couple identifiant/mot de passe inconnu.", "danger");
			break;
		case 'disconnected':
			$this->_showMessage("Vous avez été correctement déconnecté. <b>Au revoir...</b>", "success");
			break;
	}
	$_SESSION['logStatus'] = null;
?>
	<h2 class="text-center">Connexion</h2>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form action="Indexx/login" method="post" id="loginForm">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Email" name="email">
			</div>
			<div class="form-group">
				<label for="password">Mot de passe</label>
				<input type="password" class="form-control" id="password" placeholder="Password" name="pass">
			</div>
			<div class="text-center"><button type="submit" class="btn btn-default" id="submitLogin">Connexion</button></div>
		</form>	
	</div>
</div>