<?php $this->layout('layout_back', ['title' => 'Deconnexion']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p>
			<i class="fa fa-sign-out" aria-hidden="true"></i>
			&nbsp; VOULEZ-VOUS VOUS DECONNECTER ?
		</p>
	</div>

	<form method="post" class="form-horizontal">
		<div class="form-group text-center">	
				<button type="submit" name="disconnect" value="no" class="btn btn-lg btn-success btn-logout">RESTER CONNECTER</button>
				<button type="submit" name="disconnect" value="yes" class="btn btn-lg btn-danger btn-logout">DECONNEXION</button>
		</div>
	</form>

<?php $this->stop('main_content') ?>

