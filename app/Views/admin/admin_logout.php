<?php $this->layout('layout_back', ['title' => 'Deconnexion']) ?>

<?php $this->start('main_content') ?>

<div id="resultAjax"></div>


<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-md-4 control-label">Voulez vous quitter votre session?</label>
		<div class="col-md-4">
			<button type="submit" name="disconnect" value="no" class="btn btn-primary">Rester Connecter</button>
		</div>
		<div class="col-md-4">
			<button type="submit" name="disconnect" value="yes" class="btn btn-danger">Se déconnecter</button>
		</div>
		
	</div>
</form>
<?php $this->stop('main_content') ?>