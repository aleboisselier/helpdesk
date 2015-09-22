<form action="faqs/filter" method="post" name="searchForm" id="searchForm">
	<div class="form-group">
		<label for="titre" >Titre</label>
		<input name="titre" type="text" placeholder="Titre" class="form-control search" />

		<select class="form-control search " name="idCategorie">
			<?php echo $listCategorie;?>
		</select>

		<select class="form-control search" name="idUser">
			<?php echo $listUser;?>
		</select>
	</div>
</form>
<a class='btn btn-primary' id="search">Filtrer</a>
