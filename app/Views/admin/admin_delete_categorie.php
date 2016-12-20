<?php $this->layout('layout_back', ['title' => 'Supprimer une catégorie']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p>
			<i class="fa fa-sign-out" aria-hidden="true"></i>
			&nbsp; VOUS ALLEZ SUPPRIMER LA CATEGORIE&nbsp;:&nbsp;
			<br>
			<br>
			<span class="title-update"><?=$selectC['title']?></span>
		</p>
	</div>

	<br>
	<form method="post" class="form-horizontal">
		<div class="form-group text-center">
			<button type="submit" name="disconnect" value="no" class="btn btn-primary btn-lg">ANNULER</button>
			<button type="submit" name="disconnect" value="yes" class="btn btn-danger btn-lg">OUI, SUPPRIMER</button>		
		</div>
	</form>

<?php $this->stop('main_content') ?>