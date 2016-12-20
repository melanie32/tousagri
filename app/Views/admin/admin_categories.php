<?php $this->layout('layout_back', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content') ?>  

	<div class="text-center">
		<p class="text-connect">
			<i class="fa fa-list" aria-hidden="true"></i>
			&nbsp;LISTE DES CATEGORIES
		</p>
	</div>
	<br>
	

	<a class="text-add-categ text-center" id="add-category" href="<?= $this->url('admin_add_categories')?>">
	Ajouter une catégorie
	</a>
	<br>
	

	<div class="container">

		<?php foreach ($selectC as $select) : ?>
		<div class="row contain-cub-category col-md-4">		

			

			<div class="cub-category">
				<p class="text-center name-category"><?=$select['title']?></p>
				<img class="picto_category center-block" src="<?= $this->assetUrl('img/pictos/'.$select['pictogram'])?>">
				<div class="contain-link-category">
					<a class="text-center link-category" href="<?=$this->url('admin_edit_categories', ['id' => $select['id']]);?>">Modifier</a>
					<a class="text-center link-category" href="<?=$this->url('admin_delete_categorie', ['id' => $select['id']]);?>">Supprimer</a>
				</div>
			</div>
			
		</div>
		<?php endforeach; ?>	
		
	</div>
		



	

	
<?php $this->stop('main_content') ?>