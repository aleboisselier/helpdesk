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
		<form action="indexx/login" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mot de passe</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
			</div>
			<div class="text-center"><button type="submit" class="btn btn-default">Connexion</button></div>
		</form>	
	</div>
</div>