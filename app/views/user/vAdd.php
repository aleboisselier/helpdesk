<form method="post" action="users/update">
	<legend>Ajouter/modifier un utilisateur</legend>

	<input type="hidden" name="id" value="<?php echo $user->getId()?>">

	<div class="form-group">
		<label for="mail">Mail : </label>
		<input type="email" class="form-control" name="mail" id="mail" placeholder="Email" value="<?=$user->getMail()?>">
	</div>
	<div class="form-group">
		<label for="login">Login :</label>
		<input type="password" class="form-control" id="login" name="login" placeholder="Login" value="<?=$user->getLogin()?>">
	</div>
		<select class="form-control" name="idGroupe">
		<?php echo $groups;?>
	</select>
	<?php if(Auth::isAdmin()): ?>
		<div class="checkbox">
			<label><input type="checkbox" name="admin" <?php echo ($user->getAdmin()?"checked":"")?> value="1">Administrateur ?</label>
		</div>
	<?php endif ?>
	<?php if(Auth::getUser()->getId() == $user->getId()): ?>
	<label for="password">Nouveau Mot de passe :</label>
	<input type="password" name="password"  placeholder="Entrez le mot de passe" class="form-control">
	<label for="password">Confirmation Mot de passe :</label>
	<input type="password" name="password2"  placeholder="Entrez le mot de passe" class="form-control">
	<?php endif ?>
	<div class="form-group">
		<input type="submit" value="Valider" class="btn btn-default">
		<a class="btn btn-default" href="<?php echo $config["siteUrl"]?>users">Annuler</a>
	</div>
</form>