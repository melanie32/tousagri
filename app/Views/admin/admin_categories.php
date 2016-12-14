<?php $this->layout('layout_back', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content') ?>

	<div class="text-center">
		<p class="text-connect">Liste des catégories</p>
	</div>
	<br>
	<a href="#" id="add-category">Ajouter une categorie</a>

	<div class="container">

		<?php foreach ($selectC as $select) : ?>
		<div class="row contain-cub-category">
			

			<div class="cub-category col-md-4">
				<p class="text-center" id="name-category"><?=$select['title']?></p>
				<img class="picto_category center-block" src="<?= $this->assetUrl('img/picto/poisson.png')?>">
				<div id="link-category">
					<a class="text-center" href="#">Modifier</a>
					<a class="text-center" href="#">Supprimer</a>
				</div>
			</div>
			
			<div class="cub-category col-md-4">
				<p class="text-center" id="name-category">Nom de filière en dynamique</p>
				<img src="">
				<div id="link-category">
					<a class="text-center" href="#">Modifier</a>
					<a class="text-center" href="#">Supprimer</a>
				</div>
			</div>		

			<div class="cub-category col-md-4">
				<p class="text-center" id="name-category">Nom de filière en dynamique</p>
				<img src="">
				<div id="link-category">
					<a class="text-center" href="#">Modifier</a>
					<a class="text-center" href="#">Supprimer</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>	
		
	</div>
		



	

	
<?php $this->stop('main_content') ?>