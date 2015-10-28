<div class="container" style="margin-top:2%;">
	<div class="row">
		<div class="col-md-12">
			<div id="answer"></div>
		</div>
	</div>
	<h2 class="text-center">Récupération de mot de passe</h2>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form onsubmit="return false;" method="post" id="loginForm">
				<div class="form-group">
					<label for="pass">Mot de passe</label>
					<input type="password" class="form-control" id="email" placeholder="Mot de Passe" name="pass">
				</div>
				<div class="form-group">
					<label for="passC">Confirmation Mot de passe</label>
					<input type="password" class="form-control" id="email" placeholder="Confirmation" name="passC">
				</div>
				<div class="text-center"><button type="submit" class="btn btn-block btn-default" id="submitLogin"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Réinitialisation</button></div>
			</form>	
		</div>
	</div>
</div>