<ul class="nav nav-tabs nav-justified">
	<li class="active"><a>Nouveaux Tickets <span class="badge">42</span></a></li>
	<li><a>Mes Tickets</a></li>
</ul>
<br>
<div class="panel panel-info" style="font-size:110%;">
	<div class="panel-heading">
		<span class="label label-danger">Nouveau</span><b> Titre du ticket de Demande</b>
		<span class="label label-info pull-right">Demande</span>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<label>Catégorie : </label> Réseau
		</div>
	</div>
</div>
<div class="panel panel-warning">
	<div class="panel-heading" style="font-size:110%;">
		<span class="label label-danger">Nouveau</span><b> Titre du ticket d'Incident</b>
		<span class="label label-warning pull-right">Incident</span>
	</div>
	<div class="panel-body">
		<div class="col-md-12" style="font-size:110%;">
			<label>Problème de </label> Réseau<label>, signalé le  </label> 29/01/2015 <label>à</label> 12:29 <label>, par </label> admin
		</div>
	</div>
</div>


<?php 
$nb = 7;
if(floor(($nb/3)) == $nb/3){
	$res = $nb/3;
}else{
	$res = floor(($nb/3)) +1;
}

//LIMITE INFERIEURE : ((numPage+1)*3)-3
//LIMITE SUPERIEURE : (numPage+1)*3;
?>
<div class="text-center" id="pagination">
	<nav>
		<ul class="pagination">
			<li>
				<a href="#" aria-label="Précédent">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
				<?php for($i = 0; $i<$res; $i++): ?>
					<li><a href=""><?php echo $i+1; ?></a></li>
				<?php endfor; ?>
			<li>
				<a href="#" aria-label="Suivant">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
</div>

Structure de vAdmin (vue par défaut Admin) :

	NavTab

	Liste des Tickets :

		vList (Liste des 3 Tickets)

		Pagination
