<?php $this->layout('layout_back', ['title' => 'Supprimer une catégorie']) ?>

<?php $this->start('main_content') ?>

<p class="col-md-4 control-label">Vous allez supprimer la catégorie <?=$selectC['title']?></p>

<form method="post" class="form-horizontal">
	<div class="form-group">

		<div class="col-md-4">
			<button type="submit" name="disconnect" value="no" class="btn btn-primary">Annuler</button>
		</div>
		<div class="col-md-4">
			<button type="submit" name="disconnect" value="yes" class="btn btn-danger">Oui, supprimer cette catégorie</button>
		</div>
		
	</div>
</form>

<?php $this->stop('main_content') ?>