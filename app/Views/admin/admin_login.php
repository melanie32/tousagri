<?php $this->layout('layout_back', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
 
	<?php if(isset($error) && !empty($error)): ?>
		<div class="alert alert-danger"><?=$error;?></div>
	<?php endif; ?>

	<div class="text-center">
		<i class="fa fa-2x fa-sign-in" aria-hidden="true"></i>&nbsp;
		<p class="text-connect">Connexion</p>
	</div>
	<br>

	<form class="form-horizontal" method="post">
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="username">Pseudo</label>
		    <div class="col-md-4">
		  		<input id="username" name="username" placeholder="" class="form-control input-md" type="text">
			</div>
		</div>
		<br>


		<!-- Password input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="password">Mot de passe</label>
			<div class="col-md-4">
				<input id="password" name="password" placeholder="" class="form-control input-md" type="password">
			</div>
		</div>
		<br>

		<!-- Button -->
		<div class="form-group">
		  	<label class="col-md-4 control-label" for=""></label>
			<div class="col-md-4">
				<a href="<?= $this->url('admin_accueil')?>">
					<button id="" name="" class="btn btn-info center-block">Connexion</button>
				</a>
			</div>
		</div>

	</form>

	
<?php $this->stop('main_content') ?>