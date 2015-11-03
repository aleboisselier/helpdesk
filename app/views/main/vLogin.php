<!-- ########## DEBUG BUTTON - FAST CONNECT ########## -->
<div class="btn-group pull-right">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		Connexion en tant que... <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a href="indexx/asAdmin"><span class="glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;Administrateur</a></li>
		<li><a href="indexx/asUser"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Utilisateur</a></li>
	</ul>
</div>
<!-- ########## END DEBUG BUTTON - FAST CONNECT ########## -->
<div class="container" style="margin-top:2%;">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="text-center">Connexion</h2>
			<form action="Indexx/login" method="post" id="loginForm">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="pass">
					<div><a href="Support/index" id="lostPass">Mot de passe oublié ?</a></div>
					<div class="checkbox">
					    <label>
					        <input type="checkbox" name="remember" id="remember"> Se souvenir de moi
					    </label>
					</div>
				</div>
				<div class="text-center"><button type="submit" class="btn btn-default" id="submitLogin">Connexion</button></div>
			</form>	
		</div>
	</div>
</div>