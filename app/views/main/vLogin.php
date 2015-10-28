<div class="container" style="margin-top:2%;">
<?php if(isset($message)) echo $message; ?>
	<h2 class="text-center">Connexion</h2>
	<div class="row">
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
					<div><a href="Indexx/lostPassword" id="lostPass">Mot de passe oublié ?</a></div>
				</div>
				<div class="text-center"><button type="submit" class="btn btn-default" id="submitLogin">Connexion</button></div>
			</form>	
		</div>
	</div>
</div>