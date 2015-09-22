<div class="filtre col-xs-6 col-sm-4 col-md-4 panel">
	<h3>Outils de Recherche</h3>
	<form action="faqs/filter" method="post" name="searchForm" id="searchForm">
		<div class="form-group">
			<label for="titre" >Titre</label>
			<input name="titre" type="text" placeholder="Titre" class="form-control search" />

			<label for="idCategorie" >Catégorie</label>
			<select class="form-control search " name="idCategorie">
				<?php echo $listCategorie;?>
			</select>

			<label for="idUser" >Utilisateur</label>
			<select class="form-control search" name="idUser">
				<?php echo $listUser;?>
			</select>
		</div>
	</form>
	<a class='btn btn-primary' id="search">Filtrer</a>
</div>
