<<<<<<< HEAD
<?php $this->layout('layout_front', ['title' => 'Accueil']) ?>
=======
<?php $this->layout('layout_front', ['title' => '']) ?>
>>>>>>> origin/master

<?php $this->start('main_content') ?>

<!-- Titre -->
	<div class="col-md-12 headLine">
		<h1 id="text" class="hLine">Vous les agriculteurs, vous êtes tous les mêmes!</h1>
	</div>

<!-- Boutton -->
			<div class="container">
				<div class="row">
					<div class="col-md-12 startBut">
						<button id="reset" data-bound="true" type="button" class="btn btn-default start">Commencer</button>
					</div>
				</div>
			</div>

<!-- Footer -->
	<footer class="bottNav">

	
			<div>
				<div class="col-md-12 col-md-offset-6">
					<ul class="navList">
						<a href="#">A propos</a>
						<a href="#">Partenaires</a>
						<a href="#">Partager</a>
						<a href="#">Crédits</a>
						<a href="#">Mentions Légales</a>
					</ul>
				</div>
			</div>
	

	</footer>

<?php $this->stop('main_content') ?>
